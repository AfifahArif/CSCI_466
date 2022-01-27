<!--
Afifah Arif
Section 1
Professor Lehuta
TA: Shanthi
Semester: Fall 2018
Due date: 11/28/2018

USED CHROME AS BROWSER
-->
<!--connects to database-->
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
<!DOCTYPE html>
<html>
	<head>
		<title>New appt.</title>
	</head>

	<body>
		<fieldset>
		<h1>New appt.</h1>
		<form method="post" action="<php echo htmlspecialchars($_SERVER[PHP_SELF]);?>">
		

<!--connects to database-->
<?PHP
/*include('conn2.php');
try{
	$dsn = "mysql:host=courses;dbname=XXXXXXXX";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/
	$sql = "SELECT name, dog_id FROM dogs";

	$pdo->query($sql);
	$rs = $pdo->query($sql);
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
   
	echo "<form action='' method='POST'>";
	echo "<select name='dog_id'>";
	echo "</br>Dog Name:</br>";
	
	foreach($rows as $rownum => $row)
	{
		echo"<option value='".$row['dog_id']."'>" . $row['name'] . "</option>";
	}
	echo "<br>MM/DD/YYYY<br>";
	echo "<input type='date' name='date'>";
	echo "</select>";
	echo "<input type='submit' value='Submit'>";
	echo '</form>';
    
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{ 
		$dogId=$_POST['dog_id'];
		$date=$_POST['date'];
      
		$query=$pdo->prepare("INSERT INTO visits(dog_id, date) VALUES('".$dog_id."','".$date."');");
		$query->execute(); 
    
		$sql = "SELECT d.name AS Name, v.date FROM dogs d, visits v WHERE d.dog_id = v.dog_id"; 
		$pdo->query($sql);
		$rs = $pdo->query($sql);
		$rows = $rs->fetchAll(PDO::FETCH_ASSOC);

		
}
/*catch(PDOException $e)
{
	echo "Connection to database failed: " . $e->getMessage();
}*/
?>


</body>

</html>
