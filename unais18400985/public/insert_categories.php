<?php
session_start();

if(isset($_SESSION['username'])) {
;
} else {
header('location: login.php');
}

?>
<?php

if(isset($_POST['insert']))
{
    try {

        $pdoConnect = new PDO("mysql:host=v.je;dbname=unais18400985","v.je","v.je");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }

    $category_name = $_POST['category_name'];
    


    $pdoQuery = "INSERT INTO `unais18400985`.`categories`(`category_name`)VALUES(:category_name);";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":category_name"=>$category_name));
    

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
<a href="add_categories.php" class="button">Go Back</a>
</body>
</html>