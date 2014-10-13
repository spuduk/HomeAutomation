<?php
echo "ha.php<br>";

function Startup(){
	echo "starting????\n";
}

//Set '$Command' from url
$Command = $_GET['Com'];

//include additional php files
include "lights.php";
include "error.php";
include "mediacentre.php";

//Check '$Command'
switch ($Command) {
	//if '$Command' is 'Home'
	case Home:
		//call 'Lights()' function passing 'Home' as '$Command'
		Lights("$Command");

		//call 'WOL()' function passing 'Home' as '$Command'
		WOL("$Command");

		//Break from switch/case block
		break;

	//if '$Command' is 'Out'
	case Out:
                //call 'Lights()' function passing 'Out' as '$Command'
		Lights("$Command");

		//call 'WOL()' function passing 'Out' as '$Command'
		WOL("$Command");

                //Break from switch/case block
 		break;

	//if '$Command' is anything not recognised
	default:
		//Call 'Error' function passing 'Command' as error.
		Error("Command");

                //Break from switch/case block
 		break;
}


?>

