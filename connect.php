<?php
// $connect = mysql_connect("localhost", "root", "") or die ("No connection, check your server connection." . mysql_error());
// $database = "ticketing";
// $prefix="";
// mysql_select_db($database);
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ticketing";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(!$conn)
{
   die("error". mysqli_connect_error());
}
//mysqli_close($con);
?>
