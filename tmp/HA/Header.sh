#!/bin/bash

Command=$1;
Opt=$2;
File=$3;
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
        echo $datestamp "| E.g. ./"$File" Home Nodebug     |"
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


