<?php
session_start();

if(isset($_SESSION['username'])) {
;
} else {
header('location: login.php');
}

?>
<?php
    try {



        $pdoConnect = new PDO("mysql:host=v.je;dbname=unais18400985","v.je","v.je");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }


if(isset($_POST['insert']))
{

    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_desc = $_POST['product_desc'];
    $featured_product = $_POST['featured_product'];
    $product_price = $_POST['product_price'];


    $pdoQuery = "INSERT INTO `unais18400985`.`products`(`product_name`,`product_category`,`product_desc`,`featured_product`,`product_price`)VALUES(:product_name,:product_category,:product_desc,:featured_product,:product_price);";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":product_name"=>$product_name,":product_category"=>$product_category,":product_desc"=>$product_desc,":featured_product"=>$featured_product,":product_price"=>$product_price));

    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
}


?>
<html>
<head>
<style>
.button {
  background-color: #1e9397;
  border: black;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
<a href="add_products.php" class="button">Go Back</a>
</body>
</html>