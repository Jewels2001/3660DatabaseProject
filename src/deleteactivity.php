<html>
  <head>
    <link href="properties.css" rel="stylesheet" type="text/css">
  </head>
<?php
  if (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];

    $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
    // database is walw3660 pass is eeb5SaiZuw

    $sql = "delete from ACTIVITY where Aname='$_POST[Aname]'";
    if($conn->query($sql))
    {
	    echo "<h3> Activity deleted!</h3>";
    } else {
      $err = $conn->errno;
      $errtxt = $conn->error;
      if($err == 1451)
      {
	      echo "<h3>Cannot delete Activity $_POST[Aname]!</h3>";
      } else {
	      echo "you got an error code of $err. $errtxt";
      }
    }
    echo "<br><br><a href=\"main.php\">Return</a> to Home Page.";
  } else {
    echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
  }
?>
</html>
