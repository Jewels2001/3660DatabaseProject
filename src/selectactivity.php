<?php
  if(isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];

    $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
    if($mysqli->connect_errno) {
      echo "Connection Issue!";
      exit;
    }
  //echo "<p>$_POST[Aname]</p>";
    $sql = "select * from ACTIVITY where Aname='$_POST[Aname]'";
    $result = $conn->query($sql);
    if($result->num_rows != 0)
    {
      echo "<table border=1>";
      $rec = $result->fetch_assoc();

      echo "<tr>";
      echo "<td>Activity Name: $rec[Aname]</td>";
      echo "<td>Activity Date: $rec[Adate]</td>";
      echo "<td>Start Time: $rec[startTime]</td>";
      echo "<td>Length: $rec[length]</td>";
      echo "</tr>";

      echo "</table>";

    } else {
      echo "<p>Activity name $_POST[Aname] does not exist!</p>";
    }
} else {
echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}
echo "<a href=\"main.php\">Return</a> to Home Page.";

?>
