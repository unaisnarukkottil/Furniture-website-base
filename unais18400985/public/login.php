<?php
session_start();
if(!empty($_SESSION['username'])) {
header('location:adminpage.php');
}
require 'connection.php';


if(isset($_POST['login'])) {

$user = $_POST['username'];
$pass = $_POST['password'];

if(empty($user) || empty($pass)) {
$message = 'All field are required';
} else {
$query = $conn->prepare("SELECT username, password FROM administrator WHERE 
username=? AND password=? ");
$query->execute(array($user,$pass));
$row = $query->fetch(PDO::FETCH_BOTH);

if($query->rowCount() > 0) {
  $_SESSION['username'] = $user;
  header('location:adminpage.php');
} else {
  $message = "Username/Password is wrong";
}


}

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
				<li><h2><a>Administrator Page</a><h2></li>
				<li><a href="index.html">Main page</a></li>
			</ul>
        </header>





<form class="insidecontent" method="post">
<h1 class="insidecontent-title">Admin Login</h1>
<input class="insidecontent-input"type="text" name="username" placeholder="username"> 
<input class="insidecontent-input"type="password" name="password" placeholder="password">
<input class="insidecontent-button" type="submit" name="login" value="Login">

</form>
<?php
if(isset($message)) {
echo $message;
}
?>


		<footer>
			&copy; Ed's Electronics 2018
		</footer>

	</body>

</html>
