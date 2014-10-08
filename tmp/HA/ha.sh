#!/bin/bash

Command=$1;
Opt=$2;
File=$(/usr/bin/basename "${0}" "${MY_EXT}");
. Header.sh $Command $Opt $File

#----header end------

echo $datestamp "Checking 'Command' option."
case "$Command" in
	Home)
		echo $datestamp "Home option running."
		./light.sh $Command $Opt
	;;
	Out)
		echo $datestamp "Out option running."
	;;
	*)
		echo $datestamp "Error '$Command' option invalid."
		ExitError
	;;
esac
