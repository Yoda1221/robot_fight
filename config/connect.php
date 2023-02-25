<?php
namespace App\config;

include_once "config.php";

$conn = mysqli_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD, MYSQL_DB);

if (!$conn) {
    die("CONNECTION FAILED " . mysqli_connect_error());
}

//echo "CONNECTION SUCCESFULLY";
