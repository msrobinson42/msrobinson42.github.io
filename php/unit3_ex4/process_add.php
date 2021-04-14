<?php
    require_once('database.php');

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $genre_id = filter_input(INPUT_POST, 'genre', FILTER_VALIDATE_INT);
    $pages = filter_input(INPUT_POST, 'pages', FILTER_VALIDATE_INT);

    if($title != false && $genre_id != false && $pages != false){
        $update = 'INSERT INTO books(Title, GenreId, TotalPages)
                     VALUES(:title, :genre, :pages)';
        $statement = $db->prepare($update);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':genre', $genre_id, PDO::PARAM_INT);
        $statement->bindValue(':pages', $pages, PDO::PARAM_INT);
        try{
            $statement->execute();
            //$statement->debugDumpParams();
            $statement->closeCursor();
            header('Location: admin_view.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include_once('database_error.html');
            echo $error_message;
        }
    } else {
        var_dump($title);
        var_dump($genre_id);
        var_dump($pages);
        include_once('database_error.html');
    }
?>