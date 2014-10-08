<?php
//Set '$SGS2' '$i' & '$state' to stop 'undefined variable error'
$SGS2 = 0;
$i = 0;
$state = "offline";

//Switch TV Socket off on startup.
//echo exec("sudo pilight-control -l  living -d television -s off  > /dev/null &  ");

//Create infinate loop
//while (1) {
	//Set '$SGS2' to result of ping. Returns '1' for success, '0' for fail
//	$SGS2=`ping -c 1 10.8.80.8 | grep -i "64" | wc -l`;

	//Check '$SGS2' result
//	switch ($SGS2){
		//If '$SGS2' is '0'
//		case 0:
			//Check '$state'
//			switch ($state){
				//If '$state' is 'offline'
//				case offline:
//					echo $i." SGS2 not detected\n";
					//Increment '$i'
//					$i=$i+1;

					//If '$i' greater than '10'
//					if ($i > "10"){
						//Create email '$msg'
//						$msg="S2 Not Detected ".date("H:i")."\n";
//echo $msg;
						//Sent email
//						mail("mail@stewartspurrier.co.uk","HomeAutomation",$msg);
//						exec("sudo pilight-control -l  living -d television -s off > /dev/null & \n");

						//Reset '$i'
//						$i=0;

//						$state=0;
//					}
//					break;
//				case 0:
//					echo $i." SGS2 Still not detected\n";
//					break;
//				}
//			break;
//		case 1:
//			switch ($state){
//				case 1:
//					echo $i." SGS2 Still detected\n";
//					break;
//				case 0;
//					echo $i." SGS2 detected\n";
//					$i = 0;
//					$state=1;
//					$msg="S2 Detected ".date("H:i")."\n";
//					echo $msg;
//					break;
//				}
//			mail("mail@stewartspurrier.co.uk","HomeAutomation",$msg);
//			exec("sudo pilight-control -l  living -d television -s on  > /dev/null & \n");
//			break;
//		}
//sleep (1);
//}

?>
