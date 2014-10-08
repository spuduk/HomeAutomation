#!/bin/bash

#sudo apt-get -y update
#sudo apt-get -y upgrade

#sudo echo "deb mirror://apt.pilight.org/mirror.txt stable main" >> /etc/apt/sources.list
#sudo wget -O - http://apt.pilight.org/pilight.key | sudo apt-key add -
#sudo apt-get -y update
#sudo apt-get -y install pilight apache2

sudo cp setup/config.json /etc/pilight/
sudo cp setup/settings.json /etc/pilight/
sudo cp setup/HomeAutomation.php /home/pi/
sudo cp setup/init /etc/init/Home.conf
sudo chmod +x /etc/init/Home.conf
