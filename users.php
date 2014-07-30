<?php
include 'connection.php';

echo "<h2>User Data</h2>";
$result=mysql_query("SELECT * FROM data ") or die('Invalid query: ' . mysql_error());	
    while($data=mysql_fetch_array($result))  {
		echo "<div>Username : ".$data['username']."<br><br>";
		echo "Email ID : ".$data['email']."<br><br>";
		echo "Password : ".$data['password']."<br><br>";		
		echo"<button>Edit</button>";
		echo"<button>Delete</button><br><br><br><br></div>";}
?>
<a href="logout.php">Logout</a>
