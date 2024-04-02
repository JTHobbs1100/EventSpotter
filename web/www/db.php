<?php

    // Note that these are for the local Docker container
    $host = "db";
    $port = "5432";
    $database = "example";
    $user = "localuser";
    $password = "cs4640LocalUser!"; 

    $dbHandle = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

    if ($dbHandle) {
        echo "Success connecting to database";
    } else {
        echo "An error occurred connecting to the database";
    }

    $query = "CREATE TABLE IF NOT EXISTS login (
        username VARCHAR(255) PRIMARY KEY,
        password VARCHAR(255) NOT NULL
    )";
    
    // Execute the query
    $result = pg_query($dbHandle, $query);
    
    if ($result) {
        echo "Table 'login' created successfully or already exists.\n";
    } else {
        echo "An error occurred while creating the table: " . pg_last_error($dbHandle) . "\n";
    }

        

?>