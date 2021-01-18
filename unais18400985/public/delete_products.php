
<?php
session_start();

if(isset($_SESSION['username'])) {
;
} else {
header('location: login.php');
}

?>
<html>
	<head>
		<title>Ed's Electronics</title>
		<meta charset="utf-8" />
        <link rel="stylesheet" href="electronics.css" />
        	</head>

	<body>
		<header>
			<h1>Ed's Electronics</h1>
            <ul>
            <li><h2><a href="adminpage.php">Administrator Page</a><h2></li>
            <li><a href="logout.php">Logout</a></li>
			</ul>
        </header>
        <div class="content">
        <div class="vertical-menu">
  <a href="add_products.php">Add new Products</a>
  <a href="add_categories.php">Add new categories</a>
  <a href="update_products.php">Update existing products</a>
  <a href="update_categories.php">Update existing categories</a>
  <a href="#" class="active">Delete existing products</a>
  <a href="delete_categories.php">Delete existing categories</a>
  <a href="all_products.php">View all products details</a>
</div>
</div>
<div>
        <form action="delete_done_products.php" method="post">

          ID To Delete : <input type="text" name="id" required><br><br>

          <input type="submit" name="delete" value="Delete Data" onclick="return confirm('All data associated with this ID will be deleted, Are you sure you want to delete?');">

        </form>
</div>

		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
