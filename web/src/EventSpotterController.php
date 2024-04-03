<?php

class EventSpotterController {

    private $db;

    /**
     * Constructor
     */
    public function __construct($input) {
        $this->db = new Database();
        $this->input = $input;
        session_start();
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
            case "authentication":
                $this->loginDatabase();
                //echo $_SESSION["username"];
                break;
            case "successful_login":
                $this->showSuccessLogin();
                //echo $_SESSION["username"];
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
    public function showSuccessLogin() {
        $dataElement = print_r($this->input, true);
        include("/opt/src/templates/successful_login.php");
    }


    public function loginDatabase() {
        // User must provide a non-empty name, email, and password to attempt a login
        if(isset($_POST["username"]) && !empty($_POST["username"]) &&
            isset($_POST["password"]) && !empty($_POST["password"])) {

                // Check if user is in database, by email
                $res = $this->db->query("select * from login where username = $1;", $_POST["username"]);
                if (empty($res)) {
                    echo "User not found.";
                   // header("Location: ?command=successful_login");

                    return;
                   
                } else {
                    // User was in the database, verify password is correct
                    // Note: Since we used a 1-way hash, we must use password_verify()
                    // to check that the passwords match.
                    if (password_verify($_POST["password"], $res[0]["password"])) {
                        // Password was correct, save their information to the
                        // session and send them to the question page
                        $_SESSION["username"] = $res[0]["username"];
                        echo "User found.";
                        echo $res[0]["username"];
                        //header("Location: ?command=successful_login");
                        
                        return;
                    } else {
                        // Password was incorrect
                       // $this->errorMessage = "Incorrect password.";
                        echo $res[0]["password"];
                        echo "wrong password.";
                        echo $_SESSION["username"];
                        print_r($res);
                        //header("Location: ?command=successful_login");
                        //print_r($res);
                    }
                }
        } else {
            //echo "Name and password are required.";
            $this->errorMessage = "Name and password are required.";
            echo $this->errorMessage;
        }
        // If something went wrong, show the welcome page again
       // $this->showHomePage();
    }

}