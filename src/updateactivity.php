<html>
	<head><title>Update Arena ticket</title>
<link href="properties.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<h3> Update an Activity: </h3>
		<?php
		if(isset($_COOKIE["username"])){
			echo "<form action=\"updateactivity2.php\" method=post>";

			$username = $_COOKIE["username"];
			$password = $_COOKIE["password"];

			$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
			if($mysqli->connect_errno) {
				echo "Connection Issue!";
				exit;
			}

			$sql = "select * from ACTIVITY where Aname='$_POST[Aname]'";

			$result = $conn->query($sql);
			if(!$result)
			{
	   		echo "Problem executing select!";
	   		exit;
			}
      if($result->num_rows!= 0)
			{
	   		$rec=$result->fetch_assoc();
	   		echo "Activity Name: <input type=text name=\"Aname\" value=\"$rec[Aname]\"><br><br>";
	   		echo "Activity Length: <input type=text name=\"length\" value=\"$rec[length]\"><br><br>";
	   		echo "Activity Date: <input type=text name=\"Adate\" value=\"$rec[Adate]\"><br><br>";
     		echo "Activity Start Time: <input type=text name=\"startTime\" value=\"$rec[startTime]\"><br><br>";

	   		echo "<input type=hidden name=\"oldname\" value=\"$_POST[Aname]\">";
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
