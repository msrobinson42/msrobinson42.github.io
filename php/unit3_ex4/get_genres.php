<?php
    $genre_query = "SELECT * FROM genres";
    $statement = $db->prepare($genre_query);
    $statement->execute();
    $genres = $statement->fetchAll();
    $statement->closeCursor();
?>