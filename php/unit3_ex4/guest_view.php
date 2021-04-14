<?php
    require_once('database.php');

    $init_query = 'SELECT * FROM books b join genres g on b.GenreId = g.GenreId ';
    $statement = $db->prepare($init_query);
    $statement->execute();
    $books = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Guest View</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="ste.css" type="text/css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">
            <img src="assets\images\book_logo_transparent.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Bookstore
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Login</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link disabled" href="patron.php">Guests</a>
                </li>
              </ul>
            </div>
        </nav>
        
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1 class="text-center">Browse Our Books</h1>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <!--Table-->
            <div class="col-6">
                <h3 class="text-center">All Current Books</h3>
                <?php require_once('pagination_table.php'); ?>
                <!-- <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Pages</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book) : ?>
                            <tr>
                                <td><?php echo $book['BookId']; ?></td>
                                <td><?php echo $book['Title']; ?></td>
                                <td><?php echo $book['Name']; ?></td>
                                <td><?php echo $book['TotalPages']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> -->
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <footer class="text-center fixed-bottom">
                    <a href="index.html" class="btn btn-primary">Back to Login</a>
                </footer>
            </div>
            <div class="col-4"></div>
        </div>
    </body>
</html>