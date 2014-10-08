HomeAutomation Project

Requires

RaspberryPi
433mhz Receiver and Transmitter
PiLight

Install
-------

1. Download the latest copy of 'Raspbian' from 'http://www.raspberrypi.org/downloads/' and install to an sdcard.

2. Install 'PiLight'.
	sudo echo "deb mirror://apt.pilight.org/mirror.txt stable main" >> /etc/apt/sources.list
	sudo wget -O - http://apt.pilight.org/pilight.key | sudo apt-key add -
	sudo apt-get update
	sudo apt-get install pilight

