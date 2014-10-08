<?php
include("pilight-lib");
$server="localhost";
$port="9001";
$startmsg='{"message": "client gui"}';
$reponsemsg='accept client';
$config_json = file_get_contents("cron.json");
$config = json_decode($config_json,true);
$rundate = date("H:i");
$days = date("D");

var_dump("$config");

if ($config) {

  foreach($config as $conf) {
        $run=0;
        if ($conf['time'] == $rundate) {
                if (isset($conf['day'])) {
                        if (in_array($days, $conf['day'])) {
                                $run=1;
                        }
                } else {
                        $run=1;
                }
                echo $run;
                if ($run) {
                        $fp = fsockopen($server, $port);
                        if ($fp) {
                        fputs($fp, $startmsg);
                        $authmsg=json_decode(fread($fp, 30));
                        if ($authmsg->{'message'} == $reponsemsg) {

                        $message['message']="send";
                        $message['code']['location']=$conf['location'];
                        $message['code']['state']=$conf['state'];
                        if (canLoop($conf['devices'])) {
                                foreach($conf['devices'] as $device) {
                                $message['code']['device']=$device;
                                $message_json = json_encode($message);
                                fputs($fp, $message_json);
                                fread($fp, 1024);
                                }
                        } else {
                                $message['code']['device']=$conf['devices'];
                                $message_json = json_encode($message);
                                fputs($fp, $message_json);
                                fread($fp, 1024);
                        }
                        }
                        }
                }


  }
}
} else {
echo "Config: corrupt";
exit(1);
}

?>





//$SGS2 = null;
//$i = null;

//echo exec("sudo pilight-control -l  living -d television -s off  > /dev/null &  ");


//while (1) {
//	$SGS2=`ping -c 1 10.8.80.8 | grep -i "64" | wc -l`;
//	switch ($SGS2){
//		case 0:
//			echo "SGS2 not detected\n";
//			$i=$i+1;
//			if ($i -ge "10"); then
//				echo exec("sudo pilight-control -l  living -d television -s off  > /dev/null & \n");
//				$i=0;
//			fi
//			break;
//		case 1:
//			echo "SGS2 detected\n";
//			echo $i;
//			$i = 0;
//			echo exec("sudo pilight-control -l  living -d television -s on  > /dev/null & \n");
//			break;
//	}
//sleep (10);
//}
//?>
