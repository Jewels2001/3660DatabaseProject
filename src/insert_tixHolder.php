<html>
<head><title>Arena Ticket - Add New tixHolder</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){
   
   echo "<form action=\"inserttixHolder.php\" method=post>";
   
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
   
	
   $sql = "select phoneNum from TIXHOLDER"; 
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Phone Number: <input type=text name=\"phoneNum\" size=10> <br><br>";
      echo "Ticket Holder Name: <input type=text name=\"Pname\" size=255> <br><br>";
      echo "Date of Birth: <input type=date name=\"dob\" size=255> <br><br>"; 
      echo "Address: <input type=text name=\"address\" size=255> <br><br>";
      echo "Activity Name: <input type=text name=\"activityName\" size=255> <br><br>";
      echo "seat Number: <input type=int name=\"seatNum\" size=255> <br><br>";
      echo "tixHolder Number: <select name=\"phoneNum\" size=255> <br><br>";
      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[phoneNum]'>$val[phoneNum]</option>"; 
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Add Ticket Holder\">"; 
   }
   else
   {
      echo "<H3>There are no Ticket Holders in the system! </H3>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}
?>


 
</body>
</html>
