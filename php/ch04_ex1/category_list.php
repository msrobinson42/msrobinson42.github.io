<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- add code for the rest of the table here -->
        <?php foreach($categories as $c) : ?>
            <tr>
                <th><?php echo $c["categoryName"]; ?></th>
                <th>
                    <form action="delete_category.php" method="post">
                        <input type="hidden" name="category_id"
                            value="<?php echo $c["categoryID"]; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </th>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <h2>Add Category</h2>
    
    <!-- add code for the form here -->
    <form action="add_category" method="POST">
        <label>Name:</label>
        <input type="text" name="categoryName" />
        <input type="submit" value="Add" /><br>
    </form>
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>