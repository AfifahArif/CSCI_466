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
<html>
	<head>
		<title>Remove</title>
	</head>

  <body>
    <h1>Select Dog to Remove</h1>

<?PHP
/*include('conn2.php');
try{
	$dsn = "mysql:host=courses;dbname=XXXXXXXX";
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
    
	$sql = "SELECT dog_id, name, breed FROM dogs";

	$pdo->query($sql);
	$rs = $pdo->query($sql);
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
   
	echo "<form action='' method='POST'>";
	echo "<select name='dog_id'>";
	echo "</br>Dog Name:</br>";
	foreach($rows as $rownum => $row)
	{
		echo"<option value='".$row['dog_id']."'>" . $row['name'] .", " . $row['breed'] .  "</option>";
	}
	echo "<input type='submit' value='Submit'>";
	echo '</form>';
    
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$dogId=$_POST['dog_id'];
      
		$query=$pdo->prepare("DELETE FROM dogs WHERE dog_id='$dog_id'");
		$query->execute(); 
    
		$sql = "SELECT name AS Name, breed AS Breed FROM dogs"; 
		$pdo->query($sql);
		$rs = $pdo->query($sql);
		$rows = $rs->fetchAll(PDO::FETCH_ASSOC);

		echo"<table>";
		foreach($rows as $rownum => $row)
		{
			if($rownum==0)
			{
				echo"<tr>";
				foreach($row as $key => $x)
				{
					echo"<th>";
					echo"$key";
					echo"</th>";
				}
				echo"</tr>";
			}
			echo"<tr>";
			foreach($row as $key => $x)
			{
				echo"<td>";
				echo $x;
				echo"</td>";
			}
			echo"</tr>";
		}
		echo"</table>";
	}
}
catch(PDOException $e)
{
	echo "Connection to database failed: " . $e->getMessage();
}

?>

	</body>
</html>
