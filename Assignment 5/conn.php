<?php

$dsn = 'mysql:host=courses;dbname=henrybooks';
$host = 'courses';
$user= 'XXXXXXXX';
$password = 'XXXXXXXXXX';
$db = 'henrybooks';

try {
	echo "success";
$conn = new PDO($dsn,$user,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){
echo 'Conncetion to database failed: ' . $e->getMessage();
}

?>
