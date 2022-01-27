<!--
Afifah Arif
Section 1
Professor Lehuta
TA: Shanthi
Semester: Fall 2018
Due date: 11/28/2018

USED CHROME AS BROWSER
-->
<!DOCTYPE html>
<html>
	<head>
		<title>dogs</title>
		<marquee>Welcome!! Register your new dog today!</marquee>
	</head>

	<body>
		<fieldset>
		<h1>Registration:</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER[PHP_SELF]);?>">
			Name:<br>
			<input type="text" name="name"><br>
			<input type="text" breed="breed"><br>
			<br>
			<input type="submit" value="Submit">
		</fieldset>
		</form>
		<p><a href="http://students.cs.niu.edu/~XXXXXXXX/newAppointment.php"Dogs></a></p>
		<br>New appt:</br>
		<br><div class="dropdown"></br>
		<button class="dropbtn">Options</button>
		<div class="dropdown=content">
			<a href=""></a>
			<a href=""></a>
		</div>
		</div>

<!--connects to database-->
<?PHP
include('conn2.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	include('conn2.php');
	$breed=$_POST['breed'];
	$name=$_POST['name'];
	try
	{
		$dsn = "mysql:host=courses;dbname=XXXXXXXX";
		$pdo = new PDO($dsn, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query=$pdo->prepare("INSERT INTO dogs(breed, name) VALUES ('".$breed."','".$name."');");
		$query->execute();
    
		$sql = "SELECT name AS Name, breed AS Breed FROM dogs";

		$pdo->query($sql);
		$rs = $pdo->query($sql);
		$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
		echo"<table>";
		foreach($rows as $rownum => $row)
		{
			if($rownum == 0)
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
			if(gettype($key) == "string")
			{
				echo"<td>";
				echo $x;
				echo"</td>";
			}
		}
		echo"</tr>";
	}
	echo"</table>";
	}
	catch(PDOException $e)
	{
		echo "Connection to database failed: " . $e->getMessage();
	}
}
?>

</body>
</html>
