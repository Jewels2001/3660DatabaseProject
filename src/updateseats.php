<html>
	<head><title>Update Arena seat</title>
		<link href="properties.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h3> Update a seat: </h3>
		<?php
		if(isset($_COOKIE["username"])){
			echo "<form action=\"updateseats2.php\" method=post>";

			$username = $_COOKIE["username"];
			$password = $_COOKIE["password"];

			$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
			if($mysqli->connect_errno) {
				echo "Connection Issue!";
				exit;
			}

			$sql = "select * from SEATS where seatID='$_POST[seatID]'";

			$result = $conn->query($sql);
			if(!$result)
			{
	   		echo "Problem executing select!";
	   		exit;
			}
      if($result->num_rows!= 0)
			{
	   		$rec=$result->fetch_assoc();
	   		echo "Number: <input type=text name=\"seatNumber\" value=\"$rec[seatNumber]\"><br><br>";
	   		echo "SeatID: <input type=text name=\"seatID\" value=\"$rec[seatID]\"><br><br>";
	   		echo "Type: <input type=text name=\"type\" value=\"$rec[type]\"><br><br>";
     		echo "Price: <input type=text name=\"price\" value=\"$rec[price]\"><br><br>";
			echo "Section Number: <select name=\"secNumber\">";
      $sec = "select secNumber from SECTION";
      $result = $conn->query($sec);
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[secNumber]'>$val[secNumber]</option>";
      }
	  echo "</select><br><br>";
	   		echo "<input type=hidden name=\"oldnum\" value=\"$_POST[seatID]\">";
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
