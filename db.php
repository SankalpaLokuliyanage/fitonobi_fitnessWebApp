<?php
$conn = mysqli_connect("localhost","root","","fitonobi_database") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
