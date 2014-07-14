<?php
session_start();

include 'connection.php';


if (isset($_POST["login"])){
	
	$username= mysql_real_escape_string($_POST["user"]);
	$password=mysql_real_escape_string($_POST["pass"]);
	
	$result=mysql_query("SELECT * FROM data WHERE username='$username' and password='$password' ") or die('Invalid query: ' . mysql_error());
	$data=mysql_fetch_array($result);
	
	if($data['username']==$_POST["user"] && $data['password']==md5($_POST["pass"])){
		
		$id=$data['id'];
		$_SESSION['id']=$data['id'];
		$_SESSION['username']=$data['username'];
		$_SESSION['email']=$data['email'];
		$_SESSION['password']=$data['password'];
		$_SESSION['start'] = time();

		
	header('location:members.php');
	}
	
	else {echo "Your password or name may be wrong.";}}

?>

<center><h2>Login</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<center>Username : <input type="text" name="user"><br><br>
Password : <input type="password" name="pass"><br><br>
<input type="submit" value="Login" name="login">
</form><br><br>
<a href="register.php">Register</a>
</center>

