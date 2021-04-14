<?php
    require_once('database.php');

    $total_books_per_page = 5;

    if(isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $offset = ($page_no - 1) * $total_books_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $get_count = 'SELECT COUNT(*) as total_books FROM books';
    $statement = $db->prepare($get_count);
    $statement->execute();
    $total_books = $statement->fetch();
    $statement->closeCursor();
    $total_books = $total_books['total_books'];
    $total_no_of_pages = ceil($total_books / $total_books_per_page);
    $second_last = $total_no_of_pages - 1;

    $statement = $db->prepare('SELECT * FROM books b join genres g on b.GenreId = g.GenreId LIMIT :offset, :total_books_per_page');
    $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
    $statement->bindValue(':total_books_per_page', $total_books_per_page, PDO::PARAM_INT);
    $statement->execute();
    $books = $statement->fetchAll();
    $statement->closeCursor();
?>
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
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?php echo $book['BookId']; ?></td>
                        <td><?php echo $book['Title']; ?></td>
                        <td><?php echo $book['Name']; ?></td>
                        <td><?php echo $book['TotalPages']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center">
                <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                <ul class="pagination justify-content-center" style="padding-top:.5em;">
                    <li class="page-item"> <a class="page-link <?php if($page_no <= 1){ echo "disabled"; } ?>" 
                            <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>
                            Previous
                        </a>
                    </li>
                        
                    <li class="page-item"> <a class="page-link <?php if($page_no >= $total_no_of_pages){ echo "disabled"; } ?>" 
                            <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>
                            Next
                        </a>
                    </li>
                </ul>
            </div>