<?php
    require_once('database.php');
    require_once('get_genres.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Creating New Book</title>
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
                  <a class="nav-link disabled" href="add_book.php">Currently Creating Book</a>
                </li>
              </ul>
            </div>
        </nav>
        
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1 class="text-center">Add New Book</h1>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <!--Form-->
            <div class="col-4">
                <form action="process_add.php" method="POST">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" />
                    </div>
                    <div class="form-group">
                        <label for="year">Pages</label>
                        <input type="number" class="form-control" id="pages" name="pages" placeholder="Enter total pages" />
                    </div>
                    <div class="form-group">
                        <label for="author">Genre</label>
                        <select class="form-control" id="genre" name="genre">
                            <?php foreach($genres as $genre) : ?>
                                <option value="<?php echo $genre['GenreId']; ?>">
                                    <?php echo $genre['Name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="admin_view.php" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
            <div class="col-2"></div>
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