<html>
<head><title>Arena Ticket - Add New Ticket Holder</title>
<link href="properties.css" rel="stylesheet" type="text/css"></head>
<body>
<h2>Add a Ticket Holder</h2>


<?php
if(isset($_COOKIE["username"])){
   
   echo "<form action=\"inserttixHolder.php\" method=post>";
   
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
   
	
   $aname = "select Aname from ACTIVITY";

   $result = $conn->query($aname);
   if($result->num_rows != 0)
   {
      echo "Phone Number: <input type=text name=\"phoneNum\" size=10> <br><br>";
      echo "Name: <input type=text name=\"Pname\" size=255> <br><br>";
      echo "Date of Birth: <input type=date name=\"dob\"> <br><br>"; 
      echo "Address: <input type=text name=\"address\" size=255> <br><br>";
      echo "Activity Name: <select name=\"Aname\">";
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[Aname]'>$val[Aname]</option>"; 
      }
      echo "</select><br><br>"; 
      echo "Seat ID: <select name=\"seatID\">";
      $seat = "select seatID from SEATS where seatID NOT IN (SELECT seatID FROM TIXHOLDER)";
      $result = $conn->query($seat);
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[seatID]'>$val[seatID]</option>"; 
      }
      echo "</select><br><br>"; 
      echo "<input type=submit name=\"submit\" value=\"Add Ticket Holder\">"; 
   }
   else
   {
      echo "<H3>There are no Activities in the system! </H3>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}
?>


 
</body>
</html>

