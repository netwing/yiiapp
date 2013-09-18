#!/bin/bash
if pgrep Xvfb | grep "[0-9]" 
then
    echo "Xvfb already started with pid `pgrep Xvfb | grep "[0-9]"`"
else
    Xvfb :99 -ac 2>/dev/null &
fi
export DISPLAY=:99

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
MYJARFILE="$DIR/jar/selenium-server-standalone-2.35.0.jar"
java -jar $MYJARFILE
