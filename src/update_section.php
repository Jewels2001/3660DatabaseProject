<html>
  <head><title>Update Arena Ticket</title>
    <link href="properties.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h2> Update Sections: </h2>
    <?php
    if(isset($_COOKIE["username"])) {

      echo "<form action=\"updatesection.php\" method=post>";

      $username = $_COOKIE["username"];
      $password = $_COOKIE["password"];

      $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

      $sql = "select secNumber from SECTION";
      $result = $conn->query($sql);
      if($result->num_rows != 0)
      {
        echo "Section Number: <select name=\"secNumber\">";

        while($val = $result->fetch_assoc())
        {
          echo "<option value='$val[secNumber]'>$val[secNumber]</option>";
        }
        echo "</select>";
        echo "<input type=submit name=\"submit\" value=\"View\">";
      } else {
        echo "<p>Umm.. you may want to enter some data! ;) </p>";
      }
      echo "</form>";
    } else {
      echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
    }
    ?>
  </body>
</html>
