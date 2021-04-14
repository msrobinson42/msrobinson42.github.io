<?php
    require_once('database.php');

    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
    
    if($book_id == false)
    {
        echo '<script>alert("Please enter your input again.")</script>'; 
        header('Location: admin_view.php');
    }
    else
    {
        $select_book = 'SELECT * FROM books b join genres g on b.GenreId = g.GenreId WHERE BookId = :bId';
        $statement = $db->prepare($select_book);
        $statement->bindValue(':bId', $book_id);
        $statement->execute();
        $book = $statement->fetch();
        $statement->closeCursor();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Updating <?php echo $book['Title']; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="ste.css" type="text/css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">
                <img src="/assets/images/book_logo_transparent.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Library
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Login</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_view.php">Admin</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link disabled" href="update_book.php">Currently Deleting <?php echo $book['Title']; ?></a>
                </li>
              </ul>
            </div>
        </nav>
        
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1 class="text-center">Really Delete <?php echo $book['Title']; ?>?</h1>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <!--Form-->
            <div class="col-4 text-center">
                <form action="process_delete.php" method="POST">
                    <input type="hidden" value="<?php echo $book_id; ?>" id="bookId" name="bookId" />
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="admin_view.php" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <footer class="text-center fixed-bottom">
                    <a href="index.html" class="btn btn-primary">Home</a>
                </footer>
            </div>
            <div class="col-4"></div>
        </div>
    </body>
</html>