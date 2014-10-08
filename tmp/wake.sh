#!/bin/bash
Opt=$1;
mediacentrepower=$(jq -r .living.television.state /etc/pilight/config.json)
mediacentre=`ping -c 1 10.8.80.2 | grep -i "64" | wc -l`;
datestamp=`date +%F_%k%M`" wake.sh --- " ;


if [ -z "$Opt" ]; then
        echo $datestamp "No options specified."
	exit 0
fi

if [ $Opt = "debug" ]; then
        echo $datestamp "###### DEBUG MODE ######"
else
        exec 1>>/home/pi/Automation.log
fi
echo $datestamp "Checking if mediacentre online"

if [ $mediacentre = "1" ]; then
        echo $datestamp "mediacentre runnnig - skipping WOL"
else
	echo $datestamp "mediacentre not detected - trying WOL"
	sudo etherwake 00:23:54:1a:fd:8a
fi

