<center><h2>Login</h2></center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
<center>Username : <input type="text" name="username"><br><br>
Password : <input type="password" name="password"><br><br>
<input type="submit" value="Login" name="login"></center>
</form>
<br><br>
<center><a href="adminlogin.php">Administrator Login</a></center>
<center><a href="register.php">Register</a></center>

<?php
session_start();

include 'connection.php';


if (isset($_POST["login"])){
	
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	

	
	$result=mysql_query("SELECT * FROM data WHERE username='$username' and password='$password' ") or die('Invalid query: ' . mysql_error());
	$data=mysql_fetch_array($result);
	
	if($data['username']==$_POST["username"] && $data['password']==md5($_POST["password"])){
		
		$id=$data['id'];
		$_SESSION['id']=$data['id'];
		$_SESSION['username']=$data['username'];
		$_SESSION['email']=$data['email'];
		$_SESSION['password']=$data['password'];
		$_SESSION['start']=time();

	header('location:members.php');
	}
	
	else {echo "Your password or name may be wrong.";}}

?>
