<html>
	<head><title>Update Arena ticket</title>
		<link href="properties.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h3> Update a Section: </h3>
		<?php
		if(isset($_COOKIE["username"])){
			echo "<form action=\"updatesection2.php\" method=post>";

			$username = $_COOKIE["username"];
			$password = $_COOKIE["password"];

			$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
			if($mysqli->connect_errno) {
				echo "Connection Issue!";
				exit;
			}

			$sql = "select * from SECTION where secNumber='$_POST[secNumber]'";

			$result = $conn->query($sql);
			if(!$result)
			{
	   		echo "Problem executing select!";
	   		exit;
			}
      if($result->num_rows!= 0)
			{
	   		$rec=$result->fetch_assoc();
	   		echo "Section Number: <input type=text name=\"secNumber\" value=\"$rec[secNumber]\"><br><br>";
	   		echo "Section Name: <input type=text name=\"secName\" value=\"$rec[secName]\"><br><br>";
	   		echo "Amount of Seats: <input type=text name=\"amountOfSeats\" value=\"$rec[amountOfSeats]\"><br><br>";

	   		echo "<input type=hidden name=\"oldnum\" value=\"$_POST[secNumber]\">";
	   		echo "<input type=submit name=\"submit\" value=\"Update\">";
			} else {
				echo "<p>Umm...you may want to enter some data. ;) </p>";
			}
			echo "</form>";
		} else {
			echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
		}
		//Aname, date, length, startTime
		?>
	</body>
</html>
