<?php
    $table_username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $table_password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $hash = password_hash($table_password, PASSWORD_DEFAULT);

    // $host = "gator4057.hostgator.com";
    // $dbname = "mayiguy1_test";
    // $username = "mayiguy1_admin";
    // $password = "popcorn";
    // $tablename = "table1";

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

    echo $table_username.'<br>';
    echo $hash.'<br>';

    try {
        $db = new PDO($dsn, $username, $password);
        echo "success".'<br>';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
    }

    $init_query = "SELECT * FROM login 
                   WHERE username = :username 
                   and password = :pw";
    $statement = $db->prepare($init_query);
    $statement->bindValue(':username', $table_username);
    $statement->bindValue(':pw', $table_password);
    $statement->execute();

    $login = $statement->fetch();
    $statement->closeCursor();
    $securityLevel = $login['securityLevel'];

    echo $securityLevel.'<br>';

    if($securityLevel == "Guest"){
        echo $login['userName']." ".$login['password']." ".$login['securityLevel'];
    } elseif ($securityLevel == "Admin"){
        $admin_query = "SELECT * FROM login";
        $statement = $db->prepare($admin_query);
        $statement->execute();
        $logins = $statement->fetchall();
        $statement->closeCursor();

        foreach ($logins as $login) {
            echo $login['userName']." ".$login['password']." ".$login['securityLevel']."<br>";
        }
    }
    

    




?>