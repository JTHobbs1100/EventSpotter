<?php
/**
 * Configuration information
 * CS4640 Spring 2024
 *
 * Contains connection information for the local Docker
 * PostgresSQL database.  When uploading your code to the
 * CS4640 server, you can replace this file with another
 * configuration containing connection information found
 * on our course Canvas site.
 */


class Config {
    
    public static $LOCALdb = [
        "host" => "db",
        "port" => 5432,
        "user" => "localuser",
        "pass" => "cs4640LocalUser!",
        "database" => "example"
    ];

    // SPECIFIC TO JACOB, USED FOR SERVER
    public static $db = [
        "host" => "localhost",
        "port" => 5432,
        "user" => "fdu5ff",
        "pass" => "5CLPE1ga9jf4",
        "database" => "fdu5ff"
    ];

}