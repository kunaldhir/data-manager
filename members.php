<?php
session_start();
global $start;
global $expire;
if(!isset($_SESSION['id'])){header('Location:login.php');}

    $start=$_SESSION['start'];
	echo 'start:'.$start;
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
$username = $_SESSION['username'];
$result=mysql_query("SELECT * FROM data WHERE id='$id'") or die('Invalid query: ' . mysql_error());
	$data=mysql_fetch_array($result);
	
	echo "<center>"."<h2>"."Welcome ".$_SESSION['username']."</h2>"."</center>"; 
	echo "Username : ".$_SESSION['username']."<br><br>";
	echo "Email ID : ".$_SESSION['email']."<br><br>";
	echo "Password : ".$_SESSION['password']."<br><br>";


echo "<h3>Your Contacts</h3>";
$expire = time();

?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="text" name="searchbox" id="searchbox">
<input type="submit" name="search" value="Search" id="search">
</form>
<?php
if(isset($_POST["search"])) {

$searchtext = $_POST['searchbox'];

$result=mysql_query("SELECT * FROM contacts WHERE username='$username' LIKE '%$searchtext%'") or die('Invalid query: ' . mysql_error());
	$contacts=mysql_fetch_array($result);
	
	echo "Name : ".$contacts["name"]."<br><br>";
	echo "Mobile : ".$contacts["mobile"]."<br><br>";
	echo"<button id='edit'>Edit</button>";
	echo"<button id='delete'>Delete</button><br><br>";
}

?>
<a href="add.php">Add new</a><br><br>
<a href="logout.php">Logout</a>
