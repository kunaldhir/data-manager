<center><h2>Administrator Login</h2></center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
<center>Username : <input type="text" name="adminuser" id="username"><br><br>
Password : <input type="password" name="adminpass" id="password"><br><br>
<input type="submit" value="Login" name="login"></center>
</form>
<br><br>

<?php
session_start();

include 'connection.php';

if (isset($_POST["login"])){

	$username=$_POST["adminuser"];
	$password=md5($_POST["adminpass"]);
	
	$adminresult=mysql_query("SELECT * FROM admindata WHERE username='$username' and password='$password' ") or die('Invalid query: ' . mysql_error());
	$admindata=mysql_fetch_array($adminresult);
	
	if($admindata['username']==$_POST["adminuser"] && $admindata['password']==md5($_POST["adminpass"])){
		
		$_SESSION['id']=$admindata['id'];
		$_SESSION['username']=$admindata['username'];
		$_SESSION['email']=$admindata['email'];
		$_SESSION['password']=$admindata['password'];

	header('location:admin.php');

	}
	
	else {
		echo "Your password or name may be wrong.";
		}

}
?>
