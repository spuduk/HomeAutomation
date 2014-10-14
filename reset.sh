#!/bin/bash
User="pi"

if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  exit
fi

USER_HOME=$(eval echo ~${SUDO_USER})
InsDir=$USER_HOME"/HomeAutomation"
rm $InsDir"/HomeAutomation.php"
rm $InsDir"/lights.php"
rm $InsDir"/mediacentre.php"
rm /etc/pilight/config.json
rm /etc/pilight/settings.json
rm /etc/init/Home.conf
rm /var/log/HomeAutomation.log
rmdir $InsDir


