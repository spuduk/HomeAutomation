#!/bin/bash
User="pi"

if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  exit
fi

USER_HOME=$(eval echo ~${SUDO_USER})
InsDir=$USER_HOME"/HomeAutomation"

cp $InsDir"/HomeAutomation.php" $USER_HOME"/DEV/HomeAutomation/setup/"
cp $InsDir"/lights.php" $USER_HOME"/DEV/HomeAutomation/setup/"

cp /etc/pilight/config.json $USER_HOME"/DEV/HomeAutomation/setup/"
cp /etc/pilight/settings.json $USER_HOME"/DEV/HomeAutomation/setup/"



