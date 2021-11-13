<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
  <?php
  // if(isset($_COOKIE["username"])){
    echo "<form action=\"selectactivity.php\" method=post>";

    // $username = $_COOKIE["username"];
    // $password = $_COOKIE["password"];

    $conn = new mysqli("vconroy.cs.uleth.ca","walw3660","eeb5SaiZuw","walw3660");
    if($conn->connect_errno)
    {
       echo "Error connecting!";
       exit;
    }

    $sql = "select Aname from ACTIVITY";
    $result = $conn->query($sql);
    if($result->num_rows != 0) {
      echo "Activity name: <select Aname=\"Aname\">";
      while($val = $result->fetch_assoc())
      {
	       echo "<option value='$val[Aname]'>$val[Aname]</option>";
      }
      echo "</select>";
      echo "<input type=submit Aname=\"submit\" value=\"View\">";
    } else {
       echo "<p>There are no Activities in the system!</p>";
    }
    echo "</form>";
  }
  // } else {
  //   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
  // }
  ?>
</body>
</html>
