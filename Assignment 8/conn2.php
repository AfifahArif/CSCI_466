<?php

$dsn = 'mysql:host=courses;dbname=XXXXXXXX';
$host = 'courses';
$username= 'XXXXXXXX';
$password = 'XXXXXXXXX';
$db = 'XXXXXXXX';

try {
$conn = new PDO($dsn,$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){
echo 'Connection to database failed: ' . $e->getMessage();
}

?>
