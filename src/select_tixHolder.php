<!doctype html>
<html>
  <head>
    <title>Select Arena Ticket</title>
<link href="properties.css" rel="stylesheet" type="text/css">

  </head>

  <body>
    <h2>List of Ticket Holders: </h2>
    <?php
      if (isset($_COOKIE["username"])) {
        echo "<form action=\"selecttixHolder.php\" method=post>";

        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];

        $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

        $sql = "select phoneNum from TIXHOLDER";
        $result = $conn->query($sql);
        if($result->num_rows != 0) {
          echo "Ticket Holder Number: <select name=\"phoneNum\">";
          while($val = $result->fetch_assoc())
          {
	           echo "<option value='$val[phoneNum]'>$val[phoneNum]</option>";
          }
          echo "</select>";
          echo "<input type=submit name=\"submit\" value=\"View\">";
        } else {
          echo "<p>There are no Ticket Holders in the system!</p>";
        }
        echo "</form>";
      } else {
        echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
      }
    ?>
  </body>
</html>
