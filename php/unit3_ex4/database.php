<?php

    $host = "gator4057.hostgator.com";
    $dbname = "mayiguy1_bookstore";
    $username = "mayiguy1_admin";
    $password = "popcorn";
    $dsn = "mysql:host=$host;dbname=$dbname";

    // $host = "localhost";
    // $dbname = "bookstore";
    // $username = "root";
    // $password = "";
    // $dsn = "mysql:host=$host;dbname=$dbname";

    try{
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include_once('database_error.html');
        echo $error_message;
    }
?>