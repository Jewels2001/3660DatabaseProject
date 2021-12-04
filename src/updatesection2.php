<?php
	if (isset($_COOKIE["username"])) {
		$username = $_COOKIE["username"];
		$password = $_COOKIE["password"];

		$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
		if($mysqli->connect_errno)
		{
			echo "Connection Issue!";
			exit;
		}
		$sql = "update SECTION set secNumber='$_POST[secNumber]',secName='$_POST[secName]',amountOfSeats='$_POST[amountOfSeats]' where secNumber='$_POST[oldnum]'";
		if($conn->query($sql))
		{
			echo "<h3> Activity updated!</h3>";
		} else {
   		$err = $conn->errno();
   		if($err == 1062)
   		{
      	echo "<p>Section number $_POST[secNum] already exists!</p>";
   		} else {
      	echo "error code $err";
   		}
		}
	echo "<a href=\"main.php\">Return</a> to Home Page.";
	} else {
		echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
	}
//Aname, Adate, length, startTime
?>
