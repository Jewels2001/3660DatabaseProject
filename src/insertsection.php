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

    $sql = "insert into SECTION (secNumber, secName, amountOfSeats) values ('$_POST[secNumber]','$_POST[secName]','$_POST[amountOfSeats]')";
    if($conn->query($sql))
    {
      echo "<h3> Section added!</h3>";
    } else {
      $err = $conn->errno;
      if($err == 1062)
      {
        echo "<p>Section number $_POST[secNumber] already exists!</p>";
      } else {
        echo "<p>MySQL error code $err </p>";
      }
    }
    echo "<a href=\"main.php\">Return</a> to Home Page.";
  } else {
    echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
  }
?>
