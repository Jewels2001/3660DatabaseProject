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

    $sql = "insert into Seats (number, seatID, type, price) values ('$_POST[number]','$_POST[seatID]','$_POST[type]',
    '$_POST[price]')";
    
    if($conn->query($sql))
    {
      echo "<h3> Seats added!</h3>";
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
