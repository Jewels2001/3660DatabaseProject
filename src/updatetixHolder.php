<html>
	<head><title>Update ticket Holder</title>
		<link href="properties.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h3> Update an Activity: </h3>
		<?php
		if(isset($_COOKIE["username"])){
			echo "<form action=\"updatetixHolder2.php\" method=post>";

			$username = $_COOKIE["username"];
			$password = $_COOKIE["password"];

			$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
			if($mysqli->connect_errno) {
				echo "Connection Issue!";
				exit;
			}

			$sql = "select * from TIXHOLDER where phoneNum='$_POST[phoneNum]'";

			$result = $conn->query($sql);
			if(!$result)
			{
	   		echo "Problem executing select!";
	   		exit;
			}
      if($result->num_rows!= 0)
			{
	   		$rec=$result->fetch_assoc();
	   		echo "Phone Number: <input type=text name=\"phoneNum\" value=\"$rec[phoneNum]\"><br><br>";
	   		echo "Name: <input type=text name=\"Pname\" value=\"$rec[Pname]\"><br><br>";
	   		echo "Date of Birth: <input type=text name=\"dob\" value=\"$rec[dob]\"><br><br>";
     		echo "Address: <input type=text name=\"address\" value=\"$rec[address]\"><br><br>";

	   		echo "<input type=hidden name=\"oldname\" value=\"$_POST[phoneNum]\">";
	   		echo "<input type=submit name=\"submit\" value=\"Update\">";
			} else {
				echo "<p>Umm...you may want to enter some data. ;) </p>";
			}
			echo "</form>";
		} else {
			echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
		}
		?>
	</body>
</html>
