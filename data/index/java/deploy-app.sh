#!/bin/bash

HOME_DIR=`pwd`

if [ `whoami` != root ]; then
    echo 'Plz run as root'
    echo
    exit 1
fi

PROG="$0"
PARA="$2"
PARB="$3"

update_latest() {
    PROJECT_NAME="$PARA"
    if [ -z $PROJECT_NAME ]; then
        echo 'command: '$PROG' update PROJECT_NAME'
        echo
        exit 1
    fi
    if [ ! -d $PROJECT_NAME/versions ]; then
        echo 'Plz confirm project '$PROJECT_NAME'/versions exists'
        echo
        exit 1
    fi

    cd $PROJECT_NAME/versions
    APP_WAR=`ls *.war`
    if [ -z $APP_WAR ]; then
        echo 'Plz confirm '$APP_WAR' WAR package exists in the versions'
        echo
        exit 1
    fi

    DATE_TIME=`date +%Y%m%d%H%M`
    scp www@192.168.10.17:/tmp/$APP_WAR $APP_WAR.$DATE_TIME
    ln -sf $APP_WAR.$DATE_TIME $APP_WAR
    if [ `ls|wc -l` -ge 12 ]; then ls -rt|head -2|xargs rm -f; fi

    cd ../temp
    rm -rf *
    jar -xf ../versions/$APP_WAR.$DATE_TIME
    rsync -av ../properties/. .
    jar -cfM $APP_WAR.$DATE_TIME META-INF WEB-INF
    mv $APP_WAR.$DATE_TIME ../versions/$APP_WAR.$DATE_TIME
    rm -rf *
    cd ..

    salt 'shnh-app019*' cmd.run "su - www -c 'mkdir -p /data1/logs/java_release/$PROJECT_NAME/logs; cd /data1/www/java_release/$PROJECT_NAME/versions; rsync -av --del www@shnh-mon001:/data1/salt/prod/java_release/template/$PROJECT_NAME/versions/. .; cd ../bin; ./shutdown.sh; sleep 5; ps -ef|grep $PROJECT_NAME|awk \"{print \$2}\"|grep -v grep|xargs kill -9 2>/dev/null; rm -rf ../webapps/*; cp ../versions/$APP_WAR ../webapps/.; sleep 1; ./startup.sh'"

    echo
    echo -e "$PROJECT_NAME updated to \033[32m$APP_WAR.$DATE_TIME\033[0m"
    echo
    exit 0
}

roll_back() {
    PROJECT_NAME="$PARA"
    if [ -z $2 ]; then PARB=1; fi
    PROJECT_VERSION="$PARB"
    if [ -z $PROJECT_NAME ]; then
        echo 'command: '$PROG' rollback PROJECT_NAME 1 ("1" means roll back verstion to the last one)'
        echo
        exit 1
    fi
    if [ ! -d $PROJECT_NAME/versions ]; then
        echo 'Plz confirm project '$PROJECT_NAME'/versions exists'
        echo
        exit 1
    fi

    cd $PROJECT_NAME/versions
    APP_WAR=`ls *.war`
    if [ -z $APP_WAR ]; then
        echo 'Plz confirm '$APP_WAR' WAR package exists in the versions'
        echo
        exit 1
    fi
    CURE_VERSION=`readlink $APP_WAR`
    PVERSIONS=`expr $PARB + 1`
    echo $PVERSIONS
    ROLL_VERSION=`ls -rt dataCenter.war.20??????????|tail -$PVERSIONS|head -1`
    echo $ROLL_VERSION
    ln -sf $ROLL_VERSION $APP_WAR
    salt 'shnh-app019*' cmd.run "su - www -c 'cd /data1/www/java_release/$PROJECT_NAME/versions; rsync -av --del www@shnh-mon001:/data1/salt/prod/java_release/template/$PROJECT_NAME/versions/. .; cd ../bin; ./shutdown.sh; sleep 5; ps -ef|grep $PROJECT_NAME|awk \"{print \$2}\"|grep -v grep|xargs kill -9 2>/dev/null; rm -rf ../webapps/*; cp ../versions/$APP_WAR ../webapps/.; sleep 1; ./startup.sh'"
    echo
    echo -e "$PROJECT_NAME roll back from \033[33m$CURE_VERSION\033[0m to \033[32m$ROLL_VERSION\033[0m"
    echo
    exit 0
}

restart_only() {
    PROJECT_NAME="$PARA"
    if [ -z $PROJECT_NAME ]; then
        echo 'command: '$PROG' restart PROJECT_NAME'
        echo
        exit 1
    fi
    if [ ! -d $PROJECT_NAME/bin ]; then
        echo 'Plz confirm project '$PROJECT_NAME' exists'
        echo
        exit 1
    fi

    salt 'shnh-app019*' cmd.run "su - www -c 'cd /data1/www/java_release/$PROJECT_NAME/bin; ./shutdown.sh; sleep 5; ps -ef|grep $PROJECT_NAME|awk \"{print \$2}\"|grep -v grep|xargs kill -9 2>/dev/null; sleep 1; ./startup.sh'"
}

new_project() {
    PROJECT_NAME="$PARA"
    if [ -z $PROJECT_NAME ]; then
        echo 'command: '$PROG' newproject PROJECT_NAME'
        echo
        exit 1
    fi

    if [ ! -d app-template ]; then
        echo 'Plz confirm "app-template" exists'
        echo
        exit 1
    fi

    if [ -d $PROJECT_NAME ]; then
        echo "Project $PROJECT_NAME already exists"
        echo
        exit 1
    fi
    
    if [[ $PROJECT_NAME != app-*-* ]]; then
        echo -e 'Command: '$0' \033[32mapp-xxx-xxx\033[0m (app-xxx-xxx is the project_name)'
        echo
        exit 1
    fi
    
    cp -a app-template $PROJECT_NAME
    cd $PROJECT_NAME
    APP_LOG_PATH="/data1/logs/java_release/$PROJECT_NAME"
    #echo -e "Plz manually \033[32mmkdir $APP_LOG_PATH/logs\033[0m for app logs on app-servers"
    #echo -e "Also replace \033[35mDOC_BASE\033[0m with your \033[35mDOC_BASE\033[0m.war in server.xml"
    
    ## Modify the log path
    sed -i "s@APP_LOG_PATH@$APP_LOG_PATH@g" bin/catalina.sh
    sed -i "s@APP_LOG_PATH@$APP_LOG_PATH@g" conf/logging.properties
    sed -i "s@APP_LOG_PATH@$APP_LOG_PATH@g" conf/server.xml
    
    ## Modify the server ports
    CURR_PORT=`find $HOME_DIR -name server.xml -exec grep 'Server port' {} \; | grep -oP "\d+" | sort -n | tail -1`
    SERV_PORT=`expr $CURR_PORT + 10`
    HTTP_PORT=`expr $CURR_PORT + 11`
    REDI_PORT=`expr $CURR_PORT + 12`
    AAJP_PORT=`expr $CURR_PORT + 13`
    sed -i "s/8001/$SERV_PORT/g" conf/server.xml
    sed -i "s/8002/$HTTP_PORT/g" conf/server.xml
    sed -i "s/8003/$REDI_PORT/g" conf/server.xml
    sed -i "s/8004/$AAJP_PORT/g" conf/server.xml
    echo -e "Ports for new app: \033[36m$SERV_PORT, $HTTP_PORT, $REDI_PORT, $AAJP_PORT\033[0m"

    salt 'shnh-app019*' cmd.run "su - www -c 'mkdir -p $APP_LOG_PATH/logs; mkdir -p /data1/www/java_release; rsync -av www@shnh-mon001:/data1/salt/prod/java_release/template/$PROJECT_NAME /data1/www/java_release/.;'"
    
    echo "All finished."
    echo
}

case "$1" in
    update)
        update_latest $2
        ;;
    rollback)
        roll_back $2 $3
        ;;
    restart)
        restart_only $2
        ;;
    newproject)
        new_project $2
        ;;
    *)
        echo -e "Usage: $0 {update xxx | rollback xxx | restart xxx | newproject xxx}"
esac

