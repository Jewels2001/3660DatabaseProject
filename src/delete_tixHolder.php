<html>
<head><title>Arena Ticket - Delete tixHolder</title></head>
<body>
<h2>Delete a Ticket Holder</h2>


<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deletetixHolder.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	
   
   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "select phoneNum from TIXHOLDER"; 
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Phone Numbers: <select name=\"phoneNum\">";
      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[phoneNum]'>$val[phoneNum]</option>"; 
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No Ticket Holders! </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>