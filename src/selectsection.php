<?php
  if(isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];

    $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
    if($mysqli->connect_errno) {
      echo "Connection Issue!";
      exit;
    }
    $sql = "select * from SECTION where secNumber='$_POST[secNumber]'";
    $result = $conn->query($sql);
    if($result->num_rows != 0)
    {
      echo "<table border=1>";
      $rec = $result->fetch_assoc();

      echo "<tr>";
      echo "<td>Section Number: $rec[secNumber]</td>";
      echo "<td>Section Name: $rec[secName]</td>";
      echo "<td>Number of seats: $rec[amountOfSeats]</td>";
      echo "</tr>";

      echo "</table>";

    } else {
      echo "<p>Section number $_POST[secNumber] does not exist!</p>";
    }
} else {
echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}
echo "<a href=\"main.php\">Return</a> to Home Page.";

?>
