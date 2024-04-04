<?php
/**
 * HOSTED AT: https://cs4640.cs.virginia.edu/fdu5ff/EventSpotter/ -->
 * SOURCES: https://getbootstrap.com/docs/4.0/components/navbar/,
 *  https://stackoverflow.com/questions/12090077/javascript-regular-expression-password-validation-having-special-characters
 */



$GLOBALS["isLocal"] = false;
$SUBMITTER_COMP_ID = "fdu5ff";

$URL = "/students/$SUBMITTER_COMP_ID/students/$SUBMITTER_COMP_ID/private/EventSpotter";

// localhost:8080
// cs4640.cs.virginia.edu

if($_SERVER['HTTP_HOST'] == "localhost:8080") $GLOBALS["isLocal"] = true;

if($GLOBALS["isLocal"]){
    $URL = "/opt/src";
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$GLOBALS["URL"] = $URL;

// Autoload all classes in the src/ folder. This will
// automatically include the ExampleController and all
// other classes.
spl_autoload_register(function ($classname) {
    include "{$GLOBALS["URL"]}/$classname.php";
});
        

// Instantiate the controller and pass in the URL (HTTP GET) parameters
$controller = new EventSpotterController($_GET); 
$controller->run();