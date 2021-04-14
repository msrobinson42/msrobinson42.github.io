<?php
    require_once('database.php');
    require_once('get_genres.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Member View</title>
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
                  <a class="nav-link" href="index.html">Logout</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link disabled" href="member_view.php">Search for a Book</a>
                </li>
              </ul>
            </div>
        </nav>
        
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1>Find a Book</h1>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="search_book.php" method="POST">
                    <div class="form-group">
                        <label for="search">Search Title</label>
                        <input type="text" class="form-control" id="search" name="search" placeholder="Enter search terms" />
                    </div>
                    <div class="form-group">
                        <label for="searchSubject">Search Genre</label>
                        <select class="form-control" id="searchGenre" name="searchGenre">
                            <?php foreach($genres as $genre) : ?>
                                <option value="<?php echo $genre['Name']; ?>"><?php echo $genre['Name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <?php if(isset($bookSearch)) : ?>
                    <h3 class="text-center">Book Search</h3>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Pages</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php foreach ($bookSearch as $book) : ?>
                                <tr>
                                    <td><?php echo $book['BookId']; ?></td>
                                    <td><?php echo $book['Title']; ?></td>
                                    <td><?php echo $book['Name']; ?></td>
                                    <td><?php echo $book['TotalPages']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
            <div class="col-4"></div>
        </div>
    </body>
</html>