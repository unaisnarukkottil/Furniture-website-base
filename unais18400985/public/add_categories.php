
<?php
session_start();

if(isset($_SESSION['username'])) {
;
} else {
header('location: login.php');
}

?>
<?php
    try{
        $sqlconnection = new pdo('mysql:host=v.je;dbname=unais18400985;charset=utf8','v.je','v.je');
        }   
    catch(PDOException $pe){
        echo 'Cannot connect to database';
        die;
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
  <a href="#" class="active">Add new categories</a>
  <a href="update_products.php">Update existing products</a>
  <a href="update_categories.php">Update existing categories</a>
  <a href="delete_products.php">Delete existing products</a>
  <a href="delete_categories.php">Delete existing categories</a>
  <a href="all_products.php">View all products details</a>
</div>
</div>
<div class="container">
<form action="insert_categories.php" method="post">
<label for="category_name">Category</label>
<input type="text" name="category_name" placeholder="Category"><br><br>
<input type="submit" name="insert" value="Submit Data">
</form>
</div>
</div>
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
