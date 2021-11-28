<?php

if (isset($_COOKIE["username"])) { 
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username); 
    
   if($conn->query($sql)) 
   { 
      $sql = "insert into TIXHOLDER (phoneNum, Pname, dob, address) values ('$_POST[phoneNum]','$_POST[Pname]','$_POST[dob]','$_POST[address]')";
      $sql = "select Aname from ACTIVITY where activityName='$_POST[Aname]'";
      $sql = "select seatID from SEATS where seatID='$_POST[seatID]'";
      $conn->query($sql);
      echo "<h3> Ticket Holder added</h3>";
	
   }
   else {
      $err = $conn->errno; 
      if($err == 1062)
      {
	 echo "<p>Phone Number $_POST[phoneNum] already exists!</p>"; 
      }
      elseif($err == 1452)
      {
          echo "Either seatID $_POST[seatID] or activityName $_POST[Aname] doesnt exist";
      }
      else {
	 echo "error number $err"; 
      }
      
   }
   echo "<a href=\"main.php\">Return</a> to Home Page."; 
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}

?>
 