<html>
<?php
define ('DB_HOST','localhost');
define ('DB_NAME','');
define ('DB_USER','');
define ('DB_PASSWORD','');

$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die ("Failed connect to Mysql: " . mysql_error());
$db=mysqli_select_db(DB_NAME,$con) or die ("Failed connect to Mysql: " . mysql_error());

function SignIn()
{
  session_start();
  if(!empty($row['username']))
  {
    $query = mysql_query("SElECT * FROM username where username = '$_POST[username]' AND password ='$_POST[password]'") or die (mysql_error());
    $row = mysql_fetch_array($query) or die(mysql_error());
    if(!empty($row['username']) AND !empty($row['password']))
    {
      $_SESSION['username'] = $row['password'];
      echo "Successfully login...";
    }
    else
    {
      echo "Sorry, You entered wrong ID or Password...";
    }
  }
}
if(isset($_POST['submit']))
{
  SignIn();
}

?>
</html>
