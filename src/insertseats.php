<html>
  <head>
    <link href="properties.css" rel="stylesheet" type="text/css">
  </head>
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
    $sql = "insert into SEATS (seatID, seatNumber, price, type, secNumber)
    values ('$_POST[seatID]','$_POST[seatNumber]','$_POST[price]','$_POST[type]','$_POST[secNumber]')";
    if($conn->query($sql))
    {
      echo "<h3> Seat added!</h3>";
    } else {
      $err = $conn->errno;
      if($err == 1062)
      {
        echo "<p>Seat ID $_POST[seatID] already exists!</p>";
      } else {
        echo "<p>MySQL error code $err </p>";
      }
    }
    echo "<a href=\"main.php\">Return</a> to Home Page.";
  } else {
    echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
  }
?>
</html>
