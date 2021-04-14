<?php
    // $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    // $username = 'mgs_user';
    // $password = 'pa55word';

    // $host = "localhost";
    // $dbname = "test";
    // $username = "root";
    // $password = "";
    // $tablename = "login";
    // $dsn = "mysql:host=localhost;dbname=test";

    $host = "gator4057.hostgator.com";
    $dbname = "mayiguy1_test";
    $username = "mayiguy1_admin";
    $password = "popcorn";
    $tablename = "login";
    $dsn = "mysql:host=$host;dbname=$dbname";

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>