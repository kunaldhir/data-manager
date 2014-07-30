<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<style>
#form {display: none ;
	   border: solid;}
</style>

<script>
$(document).ready(function() {
$( "#form" ).dialog({
autoOpen: false,
show: {
effect: "fade",
duration: 0
},
hide: {
effect: "fade",
duration: 0
}
});
$( "#click" ).click(function() {
$( "#form" ).dialog( "open" );
});
});
</script>

 <script>
$(function() { $( "#tags" ).autocomplete({
source: search.php
});
});
</script>
      
<?php
session_start();
global $start;
global $expire;
if(!isset($_SESSION['id'])){header('Location:login.php');}

    $start=$_SESSION['start'];
	$expire=time();
	$diff=($expire-$start)/60;
	if($diff>5)
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

$result=mysql_query("SELECT * FROM contacts WHERE username='$username' and  name LIKE '$searchtext%'") or die('Invalid query: ' . mysql_error());
$num= mysql_num_rows($result);
if ($num>=1) {
	
	while($contacts=mysql_fetch_array($result)){
	
	echo "<div id='click'>Name : ".$contacts["name"]."<br><br></div>";
/*	echo "Mobile : ".$contacts["mobile"]."<br><br>";
	echo"<button id='edit'>Edit</button>";
	echo"<button id='delete'>Delete</button><br><br>";*/
}
}
else {echo "no result";}
}?>
<div id="form">
<form method='post' action='<?php echo$_SERVER["PHP_SELF"];?>'>
New name : <input type="text" name="newname" id="newname"><br><br>
New Mobile No. : <input type:"text" name="newmobile" id="newmobile"><br><br>
<input type="submit" value="Make Changes" id="submit" name="submit">
</form>
</div>
<a href="add.php">Add new</a><br><br>
<a href="logout.php">Logout</a>
