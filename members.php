<?php
session_start();
if(!isset($_SESSION['id'])){header('Location:login.php');}

    $start=$_SESSION['start'];
	echo 'start:'.$start;
	$expire=time();
	echo 'expire:'.$expire;
	$diff=($expire-$start)/60*60;
	if($diff>10)
	{ 
		session_destroy();
      echo '<script>alert("your session has been expired");window.location.reload();</script>';
	 
	  
	}

	$_SESSION['start']=time();
include 'connection.php';

global $id;
$result=mysql_query("SELECT * FROM data WHERE id='$id'") or die('Invalid query: ' . mysql_error());
	$data=mysql_fetch_array($result);
	
	echo "<center>"."<h2>"."Welcome ".$_SESSION['username']."</h2>"."</center>"; 
	echo "Username : ".$_SESSION['username']."<br><br>";
	echo "Email ID : ".$_SESSION['email']."<br><br>";
	echo "Password : ".$_SESSION['password']."<br><br>";
	

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
<a href="logout.php">Logout</a>
