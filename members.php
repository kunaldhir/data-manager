<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">

<style>
#form {display: none ;
	   border: solid;}
</style>

<script>
$(document).ready(function () {
    $("#searchbox").autocomplete({
        source: "search.php",
        create: function () {
            $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                return $('<li>')
                    .append('<a onclick="show_details();">'+ item.value + '</a>')
                    .appendTo(ul);
            };
        }
    });
});
function show_details(){
	$( "#form" ).dialog({
	autoOpen: false,
	show: {
	effect: "fadeIn",
	duration: 0
	},
	hide: {
	effect: "fadeOut",
	duration: 0
	}
	});
	
};
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


echo "<center><h3>Search your contacts</h3>";
$expire = time();

?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="text" name="searchbox" id="searchbox">
</form>

<div id="form">
<?php
$id = $_SESSION['id'];

$result=mysql_query("SELECT * FROM contacts WHERE id='$id'") or die('Invalid query: ' . mysql_error());
	$data=mysql_fetch_array($result);

	echo "Name : ".$data['name']."<br><br>";
	echo "Mobile No. : ".$data['mobile'];
?>

<form method='post' action='<?php echo $_SERVER["PHP_SELF"];?>'>
New name : <input type="text" name="newname" id="newname"><br><br>
New Mobile No. : <input type:"text" name="newmobile" id="newmobile"><br><br>
<input type="submit" value="Make Changes" id="submit" name="submit">
</form>

<?php
if(isset($_POST["submit"])) {
	$newname = $_POST['newname'];
	$newmobile = $_POST['newmobile'];

$result1=mysql_query("UPDATE contacts SET name= '$newname', mobile ='$newmobile' WHERE id='$id'") or die ('Invalid query: '.mysql_error());
	$data1=mysql_fetch_array($result1);
	echo "Your data has been updated";}
?>

</div>

<a href="add.php">Add new</a><br><br>
</center>
<a href="logout.php">Logout</a>
