<?php
    require_once('database.php');

    $searchTerm = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
    $searchGenre = filter_input(INPUT_POST, 'searchGenre', FILTER_SANITIZE_SPECIAL_CHARS);

    if($searchTerm == null || $searchTerm == false ||
        $searchGenre == null || $searchGenre == false)
    {
        echo '<script>alert("Invalid book data. Check all fields and try again.")</script>';
    }
    else
    {
        $searchTerm = '%'.$searchTerm.'%';
        $query = 'SELECT * FROM books b join genres g on b.GenreId = g.GenreId 
                WHERE Name = :name
                AND Title LIKE :search';
        $statement = $db->prepare($query);
        $statement->bindValue(':search', $searchTerm);
        $statement->bindValue(':name', $searchGenre);
        $statement->execute();
        $bookSearch = $statement->fetchAll();
        $statement->closeCursor();
    }
    include('member_view.php');
?>