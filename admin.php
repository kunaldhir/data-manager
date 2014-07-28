<?php
session_start();
include 'connection.php';

global $aid;
global $id;
$result=mysql_query("SELECT * FROM admindata WHERE id='$id'") or die('Invalid query: ' . mysql_error());
	$data=mysql_fetch_array($result);
	
	echo "<center>"."<h2>"."Welcome ".$_SESSION['username']."</h2>"."</center>"; 
	echo "<div>Username : ".$_SESSION['username']."<br><br>";
	echo "Email ID : ".$_SESSION['email']."<br><br>";
	echo "Password : ".$_SESSION['password']."<br><br></div>";
	
echo "<a href='users.php'>Show all users</a><br>";

?>
<a href="logout.php">Logout</a>
