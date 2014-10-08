<?php

while (1){
	//Set '$url' to PiLight config page
        $url="http://10.8.80.9:9001/config";

        //Set '$json' to '$url' contents
        $json = file_get_contents($url);

        //decode '$json' to '$lightstatus'
        $lightstatus = json_decode($json, TRUE);

        //Check light status of living room light
	switch ($lightstatus['config']['living']['lamp']['state']){

                //if light status is on
		case on:
			echo exec("sudo pilight-control -l  garden -d light -s on  > /dev/null &  ");
			break;
		case off:
			echo exec("sudo pilight-control -l  garden -d light -s off  > /dev/null &  ");
			break;
	}
}

?>
