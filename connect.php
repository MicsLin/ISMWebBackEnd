<?php
$db_server = 'localhost';
$db_account = 'root';
$db_password = 'Lj395XHwv6uCZGnY';
$db_name = 'ismweb';

$conn = new mysqli($db_server, $db_account, $db_password, $db_name);
if($conn->connect_error) die("連結失敗". $conn->connect_error);

$conn->set_charset("utf8mb4");