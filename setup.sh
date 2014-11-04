#!/bin/bash
User="pi"

if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  exit
fi

echo "Preforming Apt update & upgrade"
#apt-get -y update > /dev/null
#apt-get -y upgrade > /dev/null

apt="$(grep ^ /etc/apt/sources.list /etc/apt/sources.list.d/* | grep pilight |wc -l)"
if [ $apt -ge 1 ]; then
	echo "Respository already installed"
else
	echo "Adding Repository"
	echo "deb mirror://apt.pilight.org/mirror.txt stable main" >> /etc/apt/sources.list
	wget -O - http://apt.pilight.org/pilight.key | sudo apt-key add -
	apt-get -y update
fi

echo "Install PiLight and Apache2"
apt-get -y --force-yes install pilight apache2 upstart etherwake php5


echo "Create Install Directory"

USER_HOME=$(eval echo ~${SUDO_USER})
InsDir=$USER_HOME"/HomeAutomation"

if [ ! -e $InsDir ]; then
	sudo -u pi mkdir $InsDir
	echo "Create DIR"
else
	echo "DIR Exists"
fi


echo "Copying HomeAutomation files"
InsFile=$InsDir"/HomeAutomation.php"

if [ -e $InsFile ]; then
	echo "Already installed"
else
	echo "Copying"
	cp setup/config.json /etc/pilight/
	cp setup/settings.json /etc/pilight/
	sudo -u pi cp setup/HomeAutomation.php $InsDir
	sudo -u pi cp setup/lights.php $InsDir
	sudo -u pi cp setup/mediacentre.php $InsDir
fi

echo "Create init script"
if [ -e "/etc/init/Home.conf" ]; then
	echo "init script exists"
else
	echo "Creating init script"
	echo "description 'A script controlled by upstart'" > /etc/init/Home.conf
	echo "author 'Spud'" >> /etc/init/Home.conf
	echo "" >> /etc/init/Home.conf
	echo "start on started mountall" >> /etc/init/Home.conf
	echo "stop on shutdown" >> /etc/init/Home.conf
	echo "" >> /etc/init/Home.conf
	echo "script" >> /etc/init/Home.conf
	echo "  export HOME='/home/pi'">> /etc/init/Home.conf
	echo "  exec /usr/bin/php "$InsFile" >> /var/log/HomeAutomation.log 2>&1" >> /etc/init/Home.conf
	echo "end script" >> /etc/init/Home.conf

fi

echo "Applying executable tags"
chmod +x /etc/init/Home.conf

echo "Rebooting"
shutdown -r now
