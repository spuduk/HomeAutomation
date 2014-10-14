<?php

function Sunset(){
        echo "function Sunset()\n";
	//set Timezone.
//	date_default_timezone_set("GMT");

	//Set '$sunset' to sunset time for 51.46 long, -2.58 lat
	$sunset=(date_sunset(time(),SUNFUNCS_RET_TIMESTAMP,51.46,-2.58));

	//Get '$currenttime'
	$currenttime = date("H:i");
echo "The Current time is ".$currenttime."\n";
        //Set '$sunsetprior' to 30mins (1800 seconds) prior to '$sunset'
	$sunsetprior=(date("H:i",$sunset-2700));
echo "Todays Sunset minus 45mins is at ".$sunsetprior."\n";
	//is '$currenttime' after to '$sunsetprior'
	if ($currenttime > $sunsetprior){
		return "After";
	}else{
		return "Prior";
	}
}

function Turn($state){
echo "function Turn(".$state.")\n";
	//set '$url' to Pilight config page
        $url="http://10.8.80.9:5001/config";

	//Set '$json' to '$url' contents
	$json = file_get_contents($url);

	//decode '$json' to '$lightstatus'
        $lightstatus = json_decode($json, TRUE);

	//Check light status of living room light
//	switch ($lightstatus['config']['living']['lamp']['state']){

		//if light status is on
//		case on:
echo "Turning lights ".$state."\n";
			echo exec("sudo pilight-control -l living -d lamp -s ".$state."\n");
//                        echo exec("sudo pilight-control -l  living -d lamp -s ".$state."  > /dev/null &  ");
//			break;

		//if light status is off
//		case off;
//echo "Turning lights off\n";
//			echo exec("sudo pilight-control -l  living -d lamp -s ".$state."  > /dev/null &  ");
//			break;
//	}


}

function Lights($Command){
echo "function Lights(".$Command.")\n";

	//Check result of '$Command'
	switch ($Command){

		//If '$Command' is 'Home'
		case 'Home':
echo "Home Command\n";

			//Check result of 'Sunset()'
			switch (Sunset()){
				//if 'Sunset() returns 'After'
				case 'After':
echo "After adjusted Sunset time\n";
					Turn("on");
					break;

				//if @Sunset() returns 'Prior'
				case 'Prior':
echo "Prior to adjusted Sunset time\n";
					break;

				//End of 'switch (Sunset())'
				}
			break;

		//If 'Command' is Out
		case 'Out':
echo "Out Command\n";
			Turn("off");;
			break;

		//End of 'switch ($Command)';
		}

//End of 'Lights()' function
}

?>


