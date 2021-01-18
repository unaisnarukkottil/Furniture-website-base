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
<div class="vertical-menu">
  <a href="add_products.php">Add new Products</a>
  <a href="add_categories.php">Add new categories</a>
  <a href="update_products.php">Update existing products</a>
  <a href="update_categories.php">Update existing categories</a>
  <a href="delete_products.php">Delete existing products</a>
  <a href="#" class="active">Delete existing categories</a>
  <a href="all_products.php">View all products details</a>
</div>
 <div class="content">
<div >
<form class="container" action="delete_done_categories.php" method="post">
<label for="product_category">Select the category</label>
<select name="product_category">
<?php
					$commandstring = "SELECT categories.category_id,category_name FROM categories order by category_id";
					$cmd = $sqlconnection->prepare($commandstring);
					$cmd->execute();
					$result = $cmd->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row) {
						if($selid==$row['category_id']) {
							echo '<option value="'.$row['category_name'].'" selected="selected">'.$row['category_name'].'</option>';
						} else {
							echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
						}						
					}
				?>	
 </select>


 <input type="submit" name="delete" value="Submit Data">


 
</form>
</div>
</div>
		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
