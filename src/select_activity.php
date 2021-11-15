<!doctype html>
<html>
  <head>
    <title>Select Arena Ticket</title>
  </head>

  <body>
    <h2>List of Activities: </h2>
    <?php
      if (isset($_COOKIE["username"])) {
        echo "<form action=\"selectactivity.php\" method=post>";

        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];

        $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

        $sql = "select Aname from ACTIVITY";
        $result = $conn->query($sql);
        if($result->num_rows != 0) {
          echo "Activity name: <select name=\"Aname\">";
          while($val = $result->fetch_assoc())
          {
	           echo "<option value='$val[Aname]'>$val[Aname]</option>";
          }
          echo "</select>";
          echo "<input type=submit name=\"submit\" value=\"View\">";
        } else {
          echo "<p>There are no Activities in the system!</p>";
        }
        echo "</form>";
      } else {
        echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
      }
    ?>
  </body>
</html>
