<?php 

$GLOBALS["isLocal"] = false;
$GLOBALS["submitter_comp_id"] = "fdu5ff"; // SPECIFIC TO JACOB

$SUBMITTER_COMP_ID = $GLOBALS["submitter_comp_id"];

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

if(isset( $_POST['eventPage'] )) {
    $EventSpotterController = new EventSpotterController($_GET);
    $result = $EventSpotterController->getEventsJSON();
    $result = sortEvents(json_decode($result), true);
    echo json_encode($result);
    // echo "success";
}

// echo

function sortEvents($eventArr){
        
    array_multisort(array_column($eventArr, 'event_date'), SORT_ASC, array_column($eventArr, 'start_time'), SORT_ASC, array_column($eventArr, 'end_time'), SORT_ASC,  $eventArr);
    
    return $eventArr;
    
}
