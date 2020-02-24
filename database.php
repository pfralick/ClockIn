<?php
    //Connect to the database
    $dsn = 'mysql:host=localhost;dbname=location';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        $last_id = $db->lastInsertId();
              
    /* echo "/n" . "New record created successfully. Last inserted ID is: " . $last_id;
       echo "/n" . "Connected to database."; */
        
        
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>