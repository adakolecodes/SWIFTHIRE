<?php

//LINK DATABASE
$host = "localhost";
$user = "root";
$password = "";
$dbname = "swifthire";
//Create a PDO instance which takes in the host, dbname, user and password
$pdo = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);

?>