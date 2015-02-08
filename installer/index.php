<?php
if (file_exists("../config.php")) {header('Location:../'); exit();}
?>
<form action="make.php" method="post">
  <p>
    <input type="text" name="server">
  Mysql Server (maybe localhost)</p>
  <p>
    <input type="text" name="username">
  Mysql Username</p>
  <p>
    <input type="password" name="password">
  Mysql Password</p>
  <p>
    <input type="text" name="base">
  Mysql Base</p>
  <p>
    <input type="submit" value="Make the configuration file and connect to the database">
  </p>
  <p>The script will create the first user : admin (password : admin)</p>
</form>
