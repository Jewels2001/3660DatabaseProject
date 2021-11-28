<!doctype html>
<html>
  <head>
    <title>Select Arena Ticket</title>
  </head>

  <body>
    <h2>List of Seats: </h2>
    <?php
      if (isset($_COOKIE["username"])) {
        echo "<form action=\"selectseats.php\" method=post>";

        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];

        $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

        $sql = "select seatID from SEATS";
        $result = $conn->query($sql);
        if($result->num_rows != 0) {
          echo "Seat ID: <select name=\"ID\">";
          while($val = $result->fetch_assoc())
          {
	           echo "<option value='$val[seatID]'>$val[seatID]</option>";
          }
          echo "</select>";
          echo "<input type=submit name=\"submit\" value=\"View\">";
        } else {
          echo "<p>There are no seats in the system!</p>";
        }
        echo "</form>";
      } else {
        echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
      }
    ?>
  </body>
</html>
