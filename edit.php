<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
New usernamname : <input type="text" name="username" id="name">
New email : <input type="text" name="email" id="email">
New password : <input type="text" name="passowrd" id="password">
<input type="submit" value="Make Changes" name="submit">
</form>

<?php

if(isset($_POST["submit"])){

$id=$_SESSION['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$result = mysql_query("UPDATE * SET username='$username', email='$email', password='$password' WHERE id='$id' ") or die('Invalid query: ' . mysql_error());

echo "Data updated successfully !";
}
?>
