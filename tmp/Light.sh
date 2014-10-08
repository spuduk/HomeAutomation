#!/bin/bash

Command=$1;
Opt=$2;
File=$(/usr/bin/basename "${0}" "${MY_EXT}")
datestamp=`date +%F_%k%M`" "$File" --- " ;

if [ -z "$Command" -o -z "$Opt" ]; then
        echo $datestamp "_________________________________"
        echo $datestamp "|                               |"
        echo $datestamp "|        Home Automation        |"
        echo $datestamp "|                               |"
        echo $datestamp "| Valid options are ;-          |"
        echo $datestamp "|   Home                        |"
        echo $datestamp "|   Out                         |"
        echo $datestamp "| And                           |"
        echo $datestamp "|   Debug                       |"
        echo $datestamp "|   Nodebug                     |"
        echo $datestamp "|                               |"
        echo $datestamp "| E.g. ./HA.sh Home Nodebug     |"
        echo $datestamp "|_______________________________|"
        exit 1
fi

echo $datestamp "Running "$File" with '"$Command"' and '"$Opt"' Options."

if [ $Opt = "Debug" ]; then
        echo $datestamp "###### DEBUG MODE ######"
else
        exec 1>>/home/pi/Automation.log
fi

#----header end------

echo $datestamp "Checking Option."
if [ $Command = "Home" -o $Command = "Out" ]; then
        echo $datestamp $Command" option running."
	lightstatus=$(curl -s 'http://10.8.80.9:9001/config' | jq -r '.config.living.lamp.state')
	echo $datestamp "Current light status "$lightstatus
	if [ $Command = "Home" ]; then
		if [ $lightstatus = "on" ]; then
			echo $datestamp"Lights already on"
		else if [ $lightstatus = "off" ]; then
			echo $datestamp"Lights currently off"
		fi
		fi
	fi
fi
