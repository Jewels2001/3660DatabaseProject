<html>
<head><title>Arena Ticket - Add New Seat</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){
   
   echo "<form action=\"insertseats.php\" method=post>";
   
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
   
	
   $seat = "select secNumber from SECTION";

   $result = $conn->query($seat);
   if($result->num_rows != 0)
   {
      echo "Seat ID: <input type=int name=\"seatID\"> <br><br>";
      echo "Seat Number: <input type=int name=\"seatNumber\"> <br><br>";
      echo "Price: <input type=float name=\"price\"> <br><br>"; 
      echo "Type of Seat: <input type=text name=\"type\" size=255> <br><br>";
      echo "Section: <select name=\"secNumber\">";
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[seatID]'>$val[seatID]</option>"; 
      }
      echo "</select><br><br>"; 
      echo "<input type=submit name=\"submit\" value=\"Add Seat\">"; 
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