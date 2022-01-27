<html>
  <head><title>Delete Appointment</title></head>

  <body>
    <h1>Select Dog Appointment to Cancel</h1>

<?PHP
include('conn2.php');

try{
    $dsn = "mysql:host=courses;dbname=XXXXXXXX";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT d.name, v.date, v.visit_id FROM dogs d, visits v WHERE d.dog_id=v.dog_id";

    $pdo->query($sql);
    $rs = $pdo->query($sql);
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<form action='' method='POST'>";
    echo "<select name='visit_id'>";
    echo "</br>Dog Name:</br>";
    foreach($rows as $rownum => $row){
      echo"<option value='".$row['visit_id']."'>" . $row['name'] .", " . $row['date'] .  "</option>";
    }
    echo "<input type='submit' value='Submit'>";
    echo '</form>';
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
      $visitId=$_POST['visit_id'];
      
      
      $query=$pdo->prepare("DELETE FROM visits WHERE visit_id='$visit_id'");
      $query->execute(); 
    
      $sql = "SELECT d.name AS Name, v.date FROM dogs d, visits v WHERE d.dog_id = v.dog_id"; 
      $pdo->query($sql);
      $rs = $pdo->query($sql);
      $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

      echo"<table>";
      foreach($rows as $rownum => $row){
        if($rownum==0){
          echo"<tr>";
          foreach($row as $key => $x){
            echo"<th>";
            echo"$key";
            echo"</th>";
          }
          echo"</tr>";
        }
        echo"<tr>";
        foreach($row as $key => $x){
          echo"<td>";
          echo $x;
          echo"</td>";

        }
        echo"</tr>";
      }
      echo"</table>";
    }

  }
  catch(PDOException $e){
    echo "Connection to database failed: " . $e->getMessage();
  }

?>

</body>

</html>
