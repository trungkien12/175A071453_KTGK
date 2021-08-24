<?php
require_once("./env.php");

$database_host = constant("database_host");
$database_username = constant("database_username");
$database_password = constant("database_password");
$database_name = constant("database_name");

$conn = mysqli_connect($database_host, $database_username, $database_password, $database_name);

mysqli_set_charset($conn, 'utf8');
if (!$conn) die("cannot connect to the database, please make sure your connection is fine.");

// echo "database connected.";
