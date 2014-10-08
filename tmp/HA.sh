#!/bin/bash

Command=$1;
Opt=$2;
File=$(/usr/bin/basename "${0}" "${MY_EXT}")
datestamp=`date +%F_%k%M`" "$File" --- " ;

function ExitError {
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
}

if [ -z "$Command" -o -z "$Opt" ]; then
	ExitError
fi

echo $datestamp "Running "$File" with '"$Command"' and '"$Opt"' Options."

if [ $Opt = "Debug" ]; then
        echo $datestamp "###### DEBUG MODE ######"
else
        exec 1>>/home/pi/Automation.log
fi

#----header end------

SGS2=`ping -c 1 10.8.80.8 | grep -i "64" | wc -l`;

echo $datestamp "Checking Option."
case "$Command" in
	Home)
		echo $datestamp "Home option running."
	;;
	Out)
		echo $datestamp "Out option running."
	;;
	*)
		echo $datastamp "Error 'Command' option invalid."
	;;
esac

#if [ $Command = "Home" ]; then
#	echo $datestamp "Home option running."
#	if [ $SGS2 = "1" ]; then
#		echo $datestamp "SGS2 Detected"
#		echo $datestamp "Running light script Light.sh"
#		/home/pi/HA/Light.sh $Command $Opt
#		echo $datestamp "Finished light script Light.sh"
#	fi
#fi
