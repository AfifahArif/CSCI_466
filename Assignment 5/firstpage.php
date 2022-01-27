<!--
Afifah Arif
Section 1
Professor Lehuta
TA: Shanthi
Semester: Fall 2018
Due date: 10/15/2018

USED CHROME AS BROWSER
-->

<!DOCTYPE html>
<html>

<head>
	<title> TITLE </title>
</head>	
	
<body>

<h1> My first page</h1>

<!--connects to database-->
<?php
try {
	
	$dsn = "mysql:host=courses;dbname=henrybooks";
	$username = 'XXXXXXXX';
	$password = 'XXXXXXXXXX';
	$pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e)
{
	echo 'Conncetion to database failed: ' . $e->getMessage();
}
?>

<!--creates table and calls data from the database-->
<table border="1" align="center">
<tr>
	<td>Book Title</td>
	<td>Branch</td>
	<td>Num of Copies</td>
</tr>

<?php
//define $sql as query running
$sql = "SELECT Book FROM henrybooks";


//run query - results are stored into the $result object 
$result = $pdo->query($sql);

}
?>

</table>

</body>
</html>

