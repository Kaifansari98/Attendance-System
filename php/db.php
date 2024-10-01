<?php
$conn = new mysqli('localhost','root','','std_management');
if(!$conn.mysqli_connect_error())
{
echo "Connection Denied";
}
?>