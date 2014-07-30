<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
Your username : <input type="text" name="username" required><br><br>
Name : <input type="text" id="name" name="name" required><br><br>
Mobile : <input type="text" id="mobile" name="mobile" required><br><br>
<input type="submit" value="Add" id="add" name="add">
</form>


<?php

include 'connection.php';

if (isset($_POST["add"])){

	$username = $_POST["username"];
	$name = $_POST["name"];
	$mobile = $_POST["mobile"];

mysql_query("INSERT INTO contacts (username,name,mobile) VALUES ('$username','$name', '$mobile')"); 
Print "Your contacts has been successfully added to the database.";
echo "To go back to members page <a href='members.php'>Click here</a>";

}
?>
