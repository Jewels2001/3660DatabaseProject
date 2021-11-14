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

$sql = "insert into ACTIVITY (Aname, Adate, length, startTime) values ('$_POST[Aname]','$_POST[Adate]','$_POST[length]','$_POST[startTime]')"; 
if($conn->query($sql))  
{ 
    echo "<h3> Activity added!</h3>";

} else {
   $err = $conn->errno; 
   if($err == 1062)
   {
      echo "<p>Activity name $_POST[Aname] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
   
}

echo "<a href=\"main.php\">Return</a> to Home Page.";

} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>
