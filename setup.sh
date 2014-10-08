/bin/bash

sudo echo "deb mirror://apt.pilight.org/mirror.txt stable main" >> /etc/apt/sources.list
sudo wget -O - http://apt.pilight.org/pilight.key | sudo apt-key add -
sudo apt-get -y update
sudo apt-get -y install pilight
