<?php

function WOL($Command){

	//Set '$MCIP' to the mediacentre ip address
	$MCIP = "10.8.80.2";

	//Set '$MAC' to mediacentre ip
	$MAC = "00:23:54:1a:fd:8a";

	switch ($Command){
		case 'Home':
//echo "Home Command\n";
echo "|  Wake mediacentre         |\n";
			//Set '$Ping' to result of ping to '$MCIP' **outputs 1 = success or 0 = fail
			$Ping = exec("ping -c 1 ".$MCIP." | grep -i '64' | wc -l");

			//Check ping result of '$Ping'
			if ( $Ping == "0" ) {
				//execute 'etherwake' and direct output to null
				echo exec("sudo /usr/sbin/etherwake ".$MAC." > /dev/null &");
//                                echo exec("sudo /usr/sbin/etherwake ".$MAC."");
			}

			//Break from switch/case block
			break;
		case 'Out':
//echo "Out Command\n";
echo "|  Shutdown mediacentre     |\n";

			echo exec("sudo /usr/bin/ssh xbmc@".$MCIP." /home/xbmc/shutdown.sh");
//			echo exec("/usr/bin/ssh HA@".$MCIP." > /dev/null &");

			//Break from switch/case block
			break;
	}
}
?>

