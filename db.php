<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mobileshop';
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>