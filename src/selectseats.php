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
    $sql = "select * from SEATS where seatID='$_POST[seatID]'";
    $result = $conn->query($sql);
    if($result->num_rows != 0)
    {
      echo "<table border=1>";
      $rec = $result->fetch_assoc();

      echo "<tr>";
      echo "<td>Seat ID: $rec[seatID]</td>";
      echo "<td>Seat Number: $rec[seatNumber]</td>";
      echo "<td>Seat Type: $rec[type]</td>";
      echo "<td>Price: $rec[price]</td>";
      echo "<td>Section Number: $rec[secNumber]</td>";
      echo "</tr>";

      echo "</table>";

    } else {
      echo "<p>Seat $_POST[seatID] does not exist!</p>";
    }
} else {
echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}
echo "<a href=\"main.php\">Return</a> to Home Page.";

?>
