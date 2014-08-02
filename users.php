<?php
include 'connection.php';

echo "<h2>User Data</h2>";
$result=mysql_query("SELECT * FROM data ") or die('Invalid query: ' . mysql_error());	
    while($data=mysql_fetch_array($result))  {
		$_SESSION['id'] = $data['id'];
		$id = $data['id'];
		echo "<div>Username : ".$data['username']."<br><br>";
		echo "Email ID : ".$data['email']."<br><br>";
		echo "Password : ".$data['password']."<br><br>";		
		echo"<form><input type='submit' name='edit' value='Edit'>";
		echo"<input type='submit' name='delete' value='Delete'><br><br><br><br></div>";}

if(isset($_POST['edit'])){
	header('location:edit.php');
}

if(isset($_POST['delete'])){
	mysql_query("DELETE * FROM data WHERE id='$id' ") or die('Invalid query: ' . mysql_error());	
}
?>
<a href="admin.php">Back</a>
<a href="logout.php">Logout</a>
