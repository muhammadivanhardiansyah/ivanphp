<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'makanbang';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die('gagal terhubung ke database');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}