<?php

class EventSpotterController {

    private $db;

    /**
     * Constructor
     */
    public function __construct($input) {
        $this->db = new Database();
        $this->input = $input;
    }

    /**
     * Run the server
     * 
     * Given the input (usually $_GET), then it will determine
     * which command to execute based on the given "command"
     * parameter.  Default is the welcome page.
     */
    public function run() {
        // Get the command
        $command = "example";
        if (isset($this->input["command"]))
            $command = $this->input["command"];

        switch($command) {
            case "homepage":
                $this->showHomePage();
                break;
            case "events":
                $this->showEvents();
                break;
            case "eventdetails":
                $this->showEventDetails();
                break;
            case "create":
                $this->showCreate();
                break;   
            case "login":
                $this->showLogin();
                break;
            default:
                $this->showHomePage();
                break;
        }
    }

    /**
     * Show the example page to the user.
     */
    public function showHomePage() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/homepage.php");
    }
    public function showEvents() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/events.php");
    }
    public function showEventDetails() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/event-details.php");
    }
    public function showCreate() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/create.php");
    }
    public function showLogin() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/login.php");
    }
}