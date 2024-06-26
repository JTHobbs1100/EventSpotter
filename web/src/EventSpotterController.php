<?php

class EventSpotterController
{

    private $db;

    /**
     * Constructor
     */
    public function __construct($input)
    {
        $this->db = new Database();
        $this->input = $input;
        // echo print_r($input);
        session_start();
        $_SESSION["activePage"] = "homepage";
        // $_SESSION["login_status"]=false;
    }

    /**
     * Run the server
     * 
     * Given the input (usually $_GET), then it will determine
     * which command to execute based on the given "command"
     * parameter.  Default is the welcome page.
     */
    public function run()
    {
        // Get the command
        $command = "example";
        if (isset($this->input["command"]))
            $command = $this->input["command"];

        switch ($command) {
            case "delete_event":
                //$_SESSION["activePage"] = "myevents";
                $this->delete_event();
                //echo $_SESSION["username"];
                break;
            case "myevents":
                $_SESSION["activePage"] = "myevents";
                $this->showMyEvents();
                //echo $_SESSION["username"];
                break;
            case "submit_event":
                $this->submitEvent();
                //echo $_SESSION["username"];
                break;
            case "create_account":
                $this->createAccount();
                //echo $_SESSION["username"];
                break;
            case "create_account_page":
                $this->showCreateAccountPage();
                //echo $_SESSION["username"];
                break;
            case "homepage":
                $_SESSION["activePage"] = "homepage";
                $this->showHomePage();
                break;
            case "events":
                $_SESSION["activePage"] = "events";
                $this->showEvents();
                break;
            case "eventdetails":
                $this->showEventDetails();
                break;
            case "create":
                if (isset($_SESSION["login_status"]) && $_SESSION["login_status"] == true) {
                    $_SESSION["activePage"] = "create";
                    $this->showCreate();
                    break;
                } else {
                    header("Location: ?command=login");
                    break;
                }
            case "login":
                $_SESSION["activePage"] = "login";
                $this->showLogin();
                break;
            case "authentication":
                $this->loginDatabase();
                //echo $_SESSION["username"];
                break;
            case "successful_login":
                // $_SESSION["login_status"]=true;
                $this->showSuccessLogin();
                break;
            case "logout":
                $this->logout();
                break;
            default:
                $_SESSION["activePage"] = "homepage";
                $this->showHomePage();
                break;
        }
    }

    /**
     * Show the example page to the user.
     */
    public function showHomePage()
    {
        $dataElement = print_r($this->input, true);
        $res = $this->db->query("select * from events");
        $_SESSION["featuredEvents"] = $res;
        $_SESSION["featuredEvents"] = $this->sortEvents($_SESSION["featuredEvents"]);
        $_SESSION["featuredEvents"] = array_slice($_SESSION["featuredEvents"], 0, 3); //top 3 events by date/time
        include("{$GLOBALS["URL"]}/templates/homepage.php");
    }
    // function that returns JSON data
    public function getEventsJSON()
    {
        $res = $this->db->query("select * from events");
        $jsonEvents = json_encode($res);
        return $jsonEvents;
    }
    public function showEvents()
    {
        $dataElement = print_r($this->input, true);
        // $_SESSION["allEvents"] = json_decode($this->getEventsJSON(), true);
        // $_SESSION["allEvents"] = $this->sortEvents($_SESSION["allEvents"]);
        include("{$GLOBALS["URL"]}/templates/events.php");
    }
    public function showEventDetails()
    {
        $dataElement = print_r($this->input, true);
        include("{$GLOBALS["URL"]}/templates/event-details.php");
    }
    public function showCreate()
    {
        $dataElement = print_r($this->input, true);
        include("{$GLOBALS["URL"]}/templates/create.php");
    }
    public function showLogin($loginMessage = "")
    {
        $dataElement = print_r($this->input, true);
        include("{$GLOBALS["URL"]}/templates/login.php");
    }
    public function showSuccessLogin()
    {
        $dataElement = print_r($this->input, true);
        include("{$GLOBALS["URL"]}/templates/successful_login.php");
    }


    public function loginDatabase()
    {
        // User must provide a non-empty name, email, and password to attempt a login

        $loginMessage = "";

        if (
            isset($_POST["username"]) && !empty($_POST["username"]) &&
            isset($_POST["password"]) && !empty($_POST["password"])
        ) {

            // Check if user is in database, by email
            $res = $this->db->query("select * from login where username = $1;", $_POST["username"]);

            // echo print_r($res);

            if (empty($res)) {
                //$_SESSION["loginMessage"]
                $loginMessage = "<div class=\"alert alert-danger\" role=\"alert\" style=\"display: inline-block;\">
                        User does not exist! New to Event Spotter? Create an account!
                    </div>";

                $this->showLogin($loginMessage);
            } else {
                // User was in the database, verify password is correct
                // Note: Since we used a 1-way hash, we must use password_verify()
                // to check that the passwords match.
                if (password_verify($_POST["password"], $res[0]["password"])) {
                    // Password was correct, save their information to the
                    // session and send them to homepage?
                    $_SESSION["login_status"] = true;

                    $_SESSION["username"] = $res[0]["username"];
                    // echo "User found.";
                    // echo $res[0]["username"];

                    $this->showHomePage();

                    return;
                } else {
                    $loginMessage = "<div class=\"alert alert-danger\" role=\"alert\" style=\"display: inline-block;\">
                        Incorrect username or password!
                    </div>";

                    $this->showLogin($loginMessage);
                }
            }
        }
        // else {
        //     //echo "Name and password are required.";
        //     $this->errorMessage = "Name and password are required.";
        //     echo $this->errorMessage;
        // }
        // If something went wrong, show the welcome page again
        // $this->showHomePage();
    }

    public function showCreateAccountPage($accountCreationMessage = "")
    {
        $dataElement = print_r($this->input, true);
        include("{$GLOBALS["URL"]}/templates/create-account.php");
    }

    public function createAccount()
    {
        // User must provide a non-empty name, email, and password to create an account
        $accountCreationMessage = "";
        if (
            isset($_POST["username"]) && !empty($_POST["username"]) &&
            isset($_POST["password"]) && !empty($_POST["password"])
        ) {
            $res = $this->db->query("select * from login where username = $1;", $_POST["username"]);
            if (empty($res)) {
                if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]{6,16}$/", $_POST["password"])) {
                    $accountCreationMessage = "<div class=\"alert alert-danger\" role=\"alert\" style=\"display: inline-block;\">
                    Password must be 6-16 characters and contain an upper case letter, a lower case letter, and a number!
                </div>";

                    $this->showCreateAccountPage($accountCreationMessage);
                } elseif (strlen($_POST["username"]) < 5) {
                    $accountCreationMessage = "<div class=\"alert alert-danger\" role=\"alert\" style=\"display: inline-block;\">
                    Username must be at least 5 characters long!</div>";
                    $this->showCreateAccountPage($accountCreationMessage);
                } else {
                    // User was not in the database, so we can create an account
                    // Hash the password
                    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    // Insert the user into the database
                    $this->db->query("insert into login (username, password) values ($1, $2);", $_POST["username"], $hash);
                    // Save their information to the session and send them to the question page
                    $_SESSION["login_status"] = true;
                    $_SESSION["username"] = $_POST["username"];
                    $this->showHomePage();
                }
            } else {
                // User was in the database, so we cannot create an account
                //echo "User already exists.";
                $accountCreationMessage = "<div class=\"alert alert-danger\" role=\"alert\" style=\"display: inline-block;\">
                    Username already exists!
                </div>";

                $this->showCreateAccountPage($accountCreationMessage);
            }
        }
    }

    public function submitEvent()
    {
        // User must provide a non-empty name, email, and password to create an account
        if (
            isset($_POST["event_name"]) && !empty($_POST["event_name"]) &&
            isset($_POST["event_description"]) && !empty($_POST["event_description"]) &&
            isset($_POST["event_date"]) && !empty($_POST["event_date"]) &&
            isset($_POST["start_time"]) && !empty($_POST["start_time"]) &&
            isset($_POST["end_time"]) && !empty($_POST["end_time"]) &&
            isset($_POST["event_location"]) && !empty($_POST["event_location"]) && isset($_SESSION["username"])
        ) {

            // Insert the user into the database
            $this->db->query(
                "insert into events (event_name, event_description, event_date, start_time, end_time, event_location,username) values ($1, $2, $3, $4, $5, $6, $7);",
                $_POST["event_name"],
                $_POST["event_description"],
                $_POST["event_date"],
                $_POST["start_time"],
                $_POST["end_time"],
                $_POST["event_location"],
                $_SESSION["username"]
            );

            header("Location: ?command=events");
            return;
        }
    }

    public function logout()
    {
        if (isset($_SESSION["login_status"])) {
            $_SESSION["login_status"] = false;
            unset($_SESSION["username"]);
        }
        session_destroy();
        session_start();

        header("Location: ?command=homepage");
    }

    public function showMyEvents()
    {
        $res = $this->db->query("select * from events where username = $1;", $_SESSION["username"]);
        $_SESSION["myevents"] = $res;
        $_SESSION["myevents"] = $this->sortEvents($_SESSION["myevents"]);
        include("{$GLOBALS["URL"]}/templates/myevents.php");
    }

    public function sortEvents($eventArr)
    {

        array_multisort(array_column($eventArr, 'event_date'), SORT_ASC, array_column($eventArr, 'start_time'), SORT_ASC, array_column($eventArr, 'end_time'), SORT_ASC,  $eventArr);

        return $eventArr;
    }
    public function delete_event()
    {
        if (isset($_POST["event_id"]) && !empty($_POST["event_id"])) {
            $this->db->query("delete from events where event_id = $1;", $_POST["event_id"]);
        }
        header("Location: ?command=myevents");
    }
}
