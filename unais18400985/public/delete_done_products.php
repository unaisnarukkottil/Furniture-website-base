<?php
session_start();

if(isset($_SESSION['username'])) {
;
} else {
header('location: login.php');
}

?>
<?php

if(isset($_POST['delete']))
{
    try {
        $pdoConnect = new PDO("mysql:host=v.je;dbname=unais18400985","v.je","v.je");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    

    $id = $_POST['id'];
    

    $pdoQuery = "DELETE FROM `unais18400985`.`products` WHERE `product_id` = :id";

    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":id"=>$id));
    
    if($pdoExec)
    {
        echo 'Data Deleted';
    }else{
        echo 'ERROR Data Not Deleted';
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
<a href="delete_products.php" class="button">Go Back</a>
</body>
</html>