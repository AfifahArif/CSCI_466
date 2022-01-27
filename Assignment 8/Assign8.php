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
		<p><a href="http://students.cs.niu.edu/~XXXXXXXX/newAppointment.php"New appt.></a></p>
		<br>New appt:</br>
		<div class="button">
		<button class="button">Click here!</button>
		<div class="content">
			<a href="http://students.cs.niu.edu/~XXXXXXXX/newAppointment.php"></a>
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
	}
	catch(PDOException $e)
	{
		echo "Connection to database failed: " . $e->getMessage();
	}
}
?>
	</body>
</html>
