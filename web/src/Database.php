<?php
/**
 * Database Class
 *
 * Contains connection information to query PostgresSQL.
 */


class Database {
    private $dbConnector;

    /**
     * Constructor
     *
     * Connects to PostgresSQL
     */
    public function __construct() {
        if($GLOBALS["isLocal"]){
            $host = Config::$LOCALdb["host"];
            $user = Config::$LOCALdb["user"];
            $database = Config::$LOCALdb["database"];
            $password = Config::$LOCALdb["pass"];
            $port = Config::$LOCALdb["port"];
        }else{
            $host = Config::$db["host"];
            $user = Config::$db["user"];
            $database = Config::$db["database"];
            $password = Config::$db["pass"];
            $port = Config::$db["port"];
        }

        $this->dbConnector = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
    }

    /**
     * Query
     *
     * Makes a query to posgres and returns an array of the results.
     * The query must include placeholders for each of the additional
     * parameters provided.
     */
    public function query($query, ...$params) {
        $res = pg_query_params($this->dbConnector, $query, $params);

        if ($res === false) {
            echo pg_last_error($this->dbConnector);
            return false;
        }

        return pg_fetch_all($res);
    }
}