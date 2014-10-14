<?php
include "lights.php";
include "mediacentre.php";

//Set Variables
//	'$DevAvail' = Store the result of mobile ip ping
//	'$LastCon' = Mins since mobile Last Connected
//	'$State' = Is mobile connected to wifi
//	'$IP' = Static IP address of mobile phone
$DevAvail = 0;
$LastCon = 0;
$State = "offline";
$IP = "10.8.80.8";
$Home = "/home/pi/";

//Create infinate loop
while (1) {
        //Set '$DevAvail' to result of ping. Returns '1' for success, '0' for fail
        $DevAvail=`ping -c 1 $IP | grep -i "64" | wc -l`;
        //Check '$DevAvail' result
        switch ($DevAvail){
                //If '$DevAvail' is '0'
                case 0:
			//check mobile last state
			if ($State == "online"){
				//If '$LastCon' is less than 10mins
				if ($LastCon < "10"){
					echo "Mobile on IP :".$IP." was last seen online ".$LastCon." mins ago.\n";
				//If '$LastCon' is greater than 10mins
				}elseif ($LastCon > "9"){
					//Run Shutdown Sequence here
					echo "Shut down sequence.\n";

					Lights("Out");
					WOL("Out");

					//Set state to offline as mobile has not been seen for more than 10mins
					$State="offline";
				//End of '$LastCon' if statement
				}
			}elseif ($State == "offline"){
				echo "Still Offline\n";
			}
                        //Increment '$LastCon';
                        $LastCon=$LastCon+1;

                        //break from '$DevAvail' switch statement
			break;

		//If '$DevAvail' is '1'
		case 1:
			//check mobile last state
			if ($State == "offline"){
				//run startup sequence as mobile has been offline for more than 10mins
				echo "Startup sequence.\n";

				Lights("Home");
				WOL("Home");

				$State = "online";
				$LastCon = 0;

			}elseif ($State == "online"){
				//run sunset check as mobile was disconnected for less than 10mins
				echo "Check Lights.\n";

				Lights("Home");
			}
			//break from '$DevAvail' switch statement
			break;

	//End of '$DevAvail' switch statement
	}

//Sleep for 1min.
echo "Sleeping for 1 min.\n";
sleep(5);

//End of infinate while loop statement
}
?>




//echo exec("sudo pilight-control -l  living -d television -s off  > /dev/null &  ");

						//Create email '$msg'
//						$msg="S2 Not Detected ".date("H:i")."\n";
//echo $msg;
						//Sent email
//						mail($EmailAddr,$EMailSubject,$msg);
//echo exec("sudo pilight-control -l  living -d television -s off > /dev/null & \n");
