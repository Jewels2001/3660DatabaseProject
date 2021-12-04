<html>
<head>
  <link href="properties.css" rel="stylesheet" type="text/css">
</head>
<?php
// /*we should make sure it's a valid account*/
  $con = new mysqli("vconroy.cs.uleth.ca",$_POST["username"],$_POST["password"]);
  if($con->connect_errno){
    echo "$con->connect_errno";
    echo "<h3>Invalid username or password!</h3><p><a href=\"index.php\">Try Again</a></p>";
    exit;
  }

$username = $_POST["username"];
$password = $_POST["password"];

echo "<p>The username is $username and the password is $password</p>";

setcookie("username",$username,time()+3600);
setcookie("password",$password,time()+3600);

header('Location:main.php');
?>
</html>
