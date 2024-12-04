<?php

$host = "localhost";
$dbname = "cybernova";
$dbuser = "root";
$dbpassword = "root";

$mysqli = @new mysqli(
    $host,
    $dbuser,
    $dbpassword,
    $dbname
);
