<?php
    require_once('database.php');

    $book_id = filter_input(INPUT_POST, 'bookId', FILTER_VALIDATE_INT);

    if($book_id != false){
        $delete = 'DELETE FROM books WHERE BookId = :id';
        $statement = $db->prepare($delete);
        $statement->bindValue(':id', $book_id);
        $statement->execute();
        $statement->closeCursor();
    }

    header('Location: admin_view.php');
?>