<center>
<h2>Register</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
Email* : <input type="email" name="email" required><br><br>
Username* : <input type="text" name="username" required><br><br>
Password* : <input type="password" name="password" required><br><br>
<input type="submit" value="Submit" name="submit">
</form>
</center>

<?php
include 'connection.php';
if (isset($_POST["submit"])){
$email=$_POST["email"];
$username=$_POST["username"];
$password=md5($_POST["password"]);

mysql_query("INSERT INTO `admindata` (email,username,password) VALUES ('$email', '$username', '$password')"); 
Print "Your information has been successfully added to the database.";
echo "To go back to login page "."<a href='login.php'>"."Click here"."</a>";

}
?>
