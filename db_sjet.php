<?php 
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'SJET');
 if(!$conn)echo "hi";
?>
