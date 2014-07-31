<?php
session_start();
include 'connection.php';
$searchtext = trim(strip_tags($_GET['term']));
$username=$_SESSION['username'];
$result=mysql_query("SELECT * FROM contacts WHERE username='$username' and  name LIKE '$searchtext%'") or die('Invalid query: ' . mysql_error());
$num= mysql_num_rows($result);
if ($num>=1) {
	
	while($contacts=mysql_fetch_array($result)){
	
		$contacts['value']=htmlentities(stripslashes($contacts['name']));
		$contacts['id']=(int)$contacts['id'];
		$array[] = $contacts;
		$_SESSION['id']=$contacts['id'];
}
echo json_encode($array);
}
?>
