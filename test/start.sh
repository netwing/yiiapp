#!/bin/bash
if pgrep Xvfb | grep "[0-9]" 
then
    echo "Xvfb already started with pid `pgrep Xvfb | grep "[0-9]"`"
else
    Xvfb :99 -ac 2>/dev/null &
fi
export DISPLAY=:99
java -jar ../vendor/claylo/selenium-server-standalone/selenium-server-standalone-2.32.0.jar