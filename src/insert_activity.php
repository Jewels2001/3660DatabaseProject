<html>
  <head><title>Arena Ticket - Add New Activity</title></head>
  <body>
    <h2>Add an Activity</h2>
    <form action="insertactivity.php" method=post>
      Activity Name: <input type=text name="Aname" size=30><br><br>
      Activity Date: <input type=text name="Adate" size=20><br><br>
      Activity Length: <input type=text name="length" size=20><br><br>
      Activity Start Time (2pm = 14:00): <input type=text
        name="startTime" size=20><br><br>
      <input type=submit name="submit" value="Insert">
    </form>
  </body>
</html>
