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
		$sql = "update SEATS set seatID='$_POST[seatID]',number='$_POST[number]',type='$_POST[type]',price='$_POST[price]' where seatID='$_POST[seatID]'";
		if($conn->query($sql))
		{
			echo "<h3> Ticket Holder updated!</h3>";
		} else {
   		$err = $conn->errno();
   		if($err == 1062)
   		{
      	echo "<p>Section seat $_POST[seatID] already exists!</p>";
   		} else {
      	echo "error code $err";
   		}
		}
	echo "<a href=\"main.php\">Return</a> to Home Page.";
	} else {
		echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
	}
?>
