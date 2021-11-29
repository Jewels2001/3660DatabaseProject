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
    $sql = "select * from SEATS where ID='$_POST[seatID]'";
    $result = $conn->query($sql);
    if($result->num_rows != 0)
    {
      echo "<table border=1>";
      $rec = $result->fetch_assoc();

      echo "<tr>";
      echo "<td>$rec[seatID]</td>";
      echo "<td>$rec[number]</td>";
      echo "<td>$rec[type]</td>";
      echo "<td>$rec[price]</td>";
      echo "</tr>";

      echo "</table>";

    } else {
      echo "<p>Activity name $_POST[seatID] does not exist!</p>";
    }
} else {
echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}
echo "<a href=\"main.php\">Return</a> to Home Page.";

?>
