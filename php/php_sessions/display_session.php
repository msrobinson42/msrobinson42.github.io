<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Zach Robinson CIS241 Display Session</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css" >
    </head>

    <body>
        <div class="row">
            <div class="col-md-4 offset-md-3">
                <h1 class="text-center">Here are the order details of <?php echo $_SESSION['name'] ?></h1>
                <ul>
                    <li><?php echo $_SESSION['name'] ?></li>
                    <li><?php echo $_SESSION['email'] ?></li>
                    <li><?php echo $_SESSION['orderType'] ?></li>
                    <?php 
                        if(!empty($_SESSION['orderItems']))
                            foreach($_SESSION['orderItems'] as $item)
                                echo '<li>You ordered a '.$item.'.</li>';
                        else
                            echo '<li>You ordered nothing.</li>';
                    ?>
                </ul>

                <p class="text-center"><a href="index.php" class="btn btn-primary text-center">Make New Order</a></p>
            </div>
        </div>
    </body>
</html>