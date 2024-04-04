<?php

    // Note that these are for the local Docker container
    $host = "db";
    $port = "5432";
    $database = "example";
    $user = "localuser";
    $password = "cs4640LocalUser!"; 

    $dbHandle = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

    if ($dbHandle) {
        echo "Success connecting to database <br>\n";
    } else {
        echo "An error occurred connecting to the database";
    }

//     $query = "CREATE TABLE IF NOT EXISTS login (
//         username VARCHAR(255) PRIMARY KEY,
//         password VARCHAR(255) NOT NULL
//     )";
    
//     $result = pg_query($dbHandle, $query);
    
//     if ($result) {
//         echo "Table 'login' created or already exists.\n";
//     } else {
//         echo "An error occurred while creating the table: " . pg_last_error($dbHandle) . "\n";
//     }

//     $query = "CREATE TABLE IF NOT EXISTS events (
//         event_id SERIAL PRIMARY KEY,
//         event_name VARCHAR(255) NOT NULL,
//         event_description TEXT,
//         event_date DATE NOT NULL,
//         start_time TIME NOT NULL,
//         end_time TIME NOT NULL,
//         event_location VARCHAR(255) NOT NULL,
//         username VARCHAR(255) NOT NULL,
//         FOREIGN KEY (username) REFERENCES login(username)
//     )";
    
//     // Execute the query
//     $result = pg_query($dbHandle, $query);

//     if ($result) {
//         echo "Table 'events' created or already exists.\n";
//     } else {
//         echo "An error occurred while creating the table: " . pg_last_error($dbHandle) . "\n";
//     }

//     $first_user = "username";
//     $first_password = "password";
//     $first_hash = password_hash($first_password, PASSWORD_DEFAULT);

//     $query = "INSERT INTO login (username, password) VALUES ($1, $2);";
//     $result = pg_prepare($dbHandle,"login", $query);
//     $result = pg_execute($dbHandle,"login", array($first_user, $first_hash));

//     if ($result) {
//         echo "success <br>\n";
//     } else {
//         echo "An error occurred while creating the table: " . pg_last_error($dbHandle) . "\n";
//     }

//     $query = "INSERT INTO login (username, password) VALUES ($1, $2);";
//     $result = pg_prepare($dbHandle,"login", $query);
//     $result = pg_execute($dbHandle,"login", array("maseel",password_hash("pass", PASSWORD_DEFAULT) ));

//     if ($result) {
//         echo "success <br>\n";
//     } else {
//         echo "An error occurred while creating the table: " . pg_last_error($dbHandle) . "\n";
//     }

//     $query = "INSERT INTO login (username, password) VALUES ($1, $2);";
//     $result = pg_prepare($dbHandle,"login", $query);
//     $result = pg_execute($dbHandle,"login", array("jacob",password_hash("pass", PASSWORD_DEFAULT) ));

//     if ($result) {
//         echo "success <br>\n";
//     } else {
//         echo "An error occurred while creating the table: " . pg_last_error($dbHandle) . "\n";
//     }


//     $query = "INSERT INTO events (event_name,event_description,event_date,start_time,end_time,event_location,username) 
//     VALUES ($1, $2, $3, $4, $5, $6, $7);";
//     $result = pg_prepare($dbHandle,"events", $query);
//     $result = pg_execute($dbHandle,"events", array("Test Event","Test Description","04-02-2024","09:00:00","14:00:00","Test Location","maseel" ));

//     if ($result) {
//         echo "success <br>\n";
//     } else {
//         echo "An error occurred while creating the table: " . pg_last_error($dbHandle) . "\n";
//     }
// ?>