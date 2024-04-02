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
            case "events":
                $this->showEvents();
                break;
            default:
                $this->showHome();
                break;
        }
    }

    /**
     * Show the example page to the user.
     */
    public function showHome() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/homepage.php");
    }

    public function showEvents() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/events.php");
    }
}