<?php 
    session_start();

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $orderType = filter_input(INPUT_POST, 'orderType', FILTER_SANITIZE_SPECIAL_CHARS);
    $orderItems = filter_input(INPUT_POST, 'orderItems', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['orderType'] = $orderType;
    $_SESSION['orderItems'] = $orderItems;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Zach Robinson CIS241 Set Sessions</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css" >
    </head>

    <body>
        <div class="row">
            <div class="col-md-4 offset-md-3">
                <h1 class="text-center">Welcome <?php echo $_SESSION['name'] ?></h1>
                <p class="text-center"><a href="display_session.php" class="btn btn-primary text-center">View Order</a></p>
            </div>
        </div>
    </body>
</html>
