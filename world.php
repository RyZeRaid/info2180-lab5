<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_REQUEST['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($country === ""){
  $stmt = $conn->query("SELECT * FROM countries");
}else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
echo "<table border =\"1\" style='border-collapse: collapse'>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Continent</th>";
  echo "<th>Independence</th>";
  echo "<th>Head of State</th>";
  echo "</tr>";

  foreach ($results as $row){
    echo "<tr> \n";
		   echo "<td>" .$row['name']. "</td> \n";
       echo "<td>" .$row['continent']. "</td> \n";
       echo "<td>" .$row['independence_year']. "</td> \n";
       echo "<td>" .$row['head_of_state']. "</td> \n";
	  echo "</tr>";
  }
		echo "</table>";
?>