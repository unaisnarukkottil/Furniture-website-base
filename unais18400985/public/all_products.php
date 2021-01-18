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
        <link rel="stylesheet" href="electronics.css"/>
        <style>
#tablestyle {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tablestyle td, #tablestyle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tablestyle tr:nth-child(even){background-color: #f2f2f2;}

#tablestyle tr:hover {background-color: #ddd;}

#tablestyle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
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
  <a href="delete_categories.php">Delete existing categories</a>
  <a href="#" class="active">View all products details</a>
</div>
<div class="content">
<div id="tablestyle" >


<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Products Name</th><th>Category</th><th>Price</th><th>Description</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "v.je";
$username = "v.je";
$password = "v.je";
$dbname = "unais18400985";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT `products`.`product_id`,`products`.`product_name`,`products`.`product_category`,`products`.`product_price`,`products`.`product_desc` FROM `unais18400985`.`products`;"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
</div>

</div>
<footer>
&copy; Ed's Electronics 2018
</footer>

	</body>

</html>
