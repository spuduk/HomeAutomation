<?php
//Set Variables
//	'$DevAvail' = Store the result of mobile ip ping
//	'$LastCon' = Mins since mobile Last Connected
//	'$State' = Is mobile connected to wifi
//	'$IP' = Static IP address of mobile phone
$DevAvail = 0;
$LastCon = 0;
$State = "offline";
$IP = "10.8.80.8";

//Create infinate loop
while (1) {
        //Set '$DevAvail' to result of ping. Returns '1' for success, '0' for fail
        $DevAvail=`ping -c 1 $IP | grep -i "64" | wc -l`;
        //Check '$DevAvail' result
        switch ($DevAvail){
                //If '$DevAvail' is '0'
                case 0:
			
			break;
		//If @$DevAvail' is '1'
		case 1:
			
			break;
	}

//End of infinate loop
}
?>



//Switch TV Socket off on startup.
//echo exec("sudo pilight-control -l  living -d television -s off  > /dev/null &  ");

//Create infinate loop
//while (1) {
	//Set '$DevAvail' to result of ping. Returns '1' for success, '0' for fail
//	$DevAvail=`ping -c 1 $IP | grep -i "64" | wc -l`;

	//Check '$DevAvail' result
//	switch ($DevAvail){
		//If '$DevAvail' is '0'
//		case 0:
			//Check '$state'
//			switch ($state){
				//If '$state' is 'offline'
//				case offline:
//					echo $LastCon." SGS2 not detected\n";
					//Increment '$LastCon'
//					$LastCon=$LastCon+1;

					//If '$LastCon' greater than '10'
//					if ($LastCon > "10"){
						//Create email '$msg'
//						$msg="S2 Not Detected ".date("H:i")."\n";
//echo $msg;
						//Sent email
//						mail("mail@stewartspurrier.co.uk","HomeAutomation",$msg);
//						exec("sudo pilight-control -l  living -d television -s off > /dev/null & \n");

						//Reset '$LastCon'
//						$LastCon=0;

//						$state=0;
//					}
//					break;
//				case 0:
//					echo $LastCon." SGS2 Still not detected\n";
//					break;
//				}
//			break;
//		case 1:
//			switch ($state){
//				case 1:
//					echo $LastCon." SGS2 Still detected\n";
//					break;
//				case 0;
//					echo $LastCon." SGS2 detected\n";
//					$LastCon = 0;
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
