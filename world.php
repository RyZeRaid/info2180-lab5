<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_REQUEST['country'];
$context = $_REQUEST['context'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($country === ""){
  if ($context === "cities"){
    $stmt = $conn->query("SELECT * FROM countries INNER JOIN cities ON countries.code=cities.country_code");
  }else{
    $stmt = $conn->query("SELECT * FROM countries");
  }
}else{
  if ($context === "cities"){
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM countries INNER JOIN cities ON countries.code=cities.country_code WHERE countries.name LIKE '%$country%'");
  }else{
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  }
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
echo "<table border =\"1\" style='border-collapse: collapse'>";

if($context === "cities"){
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>District</th>";
  echo "<th>Population</th>";
  echo "</tr>";

  foreach ($results as $row){
    echo "<tr> \n";
		   echo "<td>" .$row['name']. "</td> \n";
       echo "<td>" .$row['district']. "</td> \n";
       echo "<td>" .$row['population']. "</td> \n";
	  echo "</tr>";
  }
}else{
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
}
  
		echo "</table>";
?>