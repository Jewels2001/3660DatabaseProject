<html>
<head><title>Arena Ticket - Select tixHolder<</title></head>
<body>
<?php

try{

  
if(isset($_COOKIE["username"]))
{
   echo "<form action=\"selecttixHolder.php\" method=post>";
	
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	
   
   $conn = new mysqli('vconroy.cs.uleth.ca',$username,$password, $username);
   if($conn->connect_errno)
   {
      echo "Error connecting!";
      exit; 
   }

   $sql = "select phoneNum from TIXHOLDER"; 
   $result = $conn->query($sql);

   if(!$result)
   {
      echo "Problem with processing query";
      exit; 
   }
   else if($result->num_rows > 0)
   {
      echo "Ticket Holder Number: <select name=\"phoneNum\">";
	      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='".$val['phoneNum']."'>".$val['phoneNum']."</option>"; 
	      
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>There are no ticket holders in the system!</p>"; 
   }
   
   echo "</form>";
}
else echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

} catch (PDOException $ex) {

   echo $ex->getMessage(); 
  }

?>


 
</body>
</html>