<?php
    require_once('database.php');
    $table_username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $table_password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $hash = password_hash($table_password, PASSWORD_DEFAULT);

    $tablename = "login";
    
    // $host = "gator4057.hostgator.com";
    // $dbname = "mayiguy1_test";
    // $username = "mayiguy1_admin";
    // $password = "popcorn";
    // $tablename = "login";
    // $dsn = "mysql:host=$host;dbname=$dbname";

    $init_query = "SELECT * FROM login 
                   WHERE username = :username 
                   and password = :pw";
    $statement = $db->prepare($init_query);
    $statement->bindValue(':username', $table_username);
    $statement->bindValue(':pw', $table_password);
    $statement->execute();

    $login = $statement->fetch();
    $statement->closeCursor();
    $securityLevel = $login['security'];

    if($securityLevel == "guest"){
        //echo $login['username']." ".$login['password']." ".$login['security'];
        //include('guest_view.php');
        header("Location: guest_view.php");
    } elseif ($securityLevel == "member"){
        //echo $login['username']." ".$login['password']." ".$login['security'];
        header("Location: member_view.php");
    } elseif ($securityLevel == "administrator"){
        header("Location: admin_view.php");
    } else {
        echo '<script>alert("No such user found.")</script>'; 
        //header("Location: index.html");
        include('index.html');
    }
    

    




?>