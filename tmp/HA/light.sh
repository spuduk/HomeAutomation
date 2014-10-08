#!/bin/bash

Command=$1
Opt=$2
File=$(/usr/bin/basename "${0}" "${MY_EXT}")
. Header.sh $Command $Opt $File

#----header end------

echo $datestamp "Checking 'Command' option."
if [ $Command = "Home" -o $Command = "Out" ]; then
        echo $datestamp $Command" option running."
	lightstatus=$(curl -s 'http://10.8.80.9:9001/config' | jq -r '.config.living.lamp.state')
	echo $datestamp "Current light status "$lightstatus

	# l = yahoo location code 13963 = Bristol, UK
	l=13963
	sunset12=$(curl -s http://weather.yahooapis.com/forecastrss?w=$l|grep astronomy| awk -F\" '{print $4;}')
	echo $datestamp "Sunset today is at "$sunset12

	sunset24=$(echo $sunset12 | awk -F' ' '{print $1;}')
	sunsetM=$(echo $sunset24 | awk -F\: '{print $2;}')
	if [ $sunsetM -le "30" ]; then
        	sunsetM=$((10#$sunsetM +30))
        	Add=11
	else
        	sunsetM=$[$sunsetM -30]
        	Add=12
	fi
	sunsetH=$(echo $sunset12 | awk -F\: '{print $1;}')
	sunsetH=$[$sunsetH + $Add]
	sunset24=$sunsetH$sunsetM

	echo $datestamp "30 mins prior to sunset" $sunset24
	currenttime=`date +%k%M` ;

	case $Command in
		Home)
			echo $datestamp "lights Home"
			case $lightstatus in
				on)
					echo $datestamp "Lights already on"
				;;
				off)
					echo $datestamp "Checking if later then 30 minutes prior to sunset."
					if [ $currenttime -ge $sunset24 ]; then
						echo $datestamp "Sunset time past - Switch lights on"
				                if [ $Opt = "Debug" ]; then
                        				echo $datestamp "## DEBUG ## Lights on"
                				else
                        				pilight-send -p kaku_screen_old -t -u 0 -i 0
                				fi
                				echo $datestamp "Lights On"
					else
						echo $datestamp "Not yet Sunset"
					fi
				;;
			esac
		;;
		Out)
			echo $datestamp "Out light sequence running"
			case $lightstatus in
				on)
					echo $datestamp "Lights on"
				;;
			esac
		;;
	esac
fi
