<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$countryQuery = $_GET['country'];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$countryQuery%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['country'])) 
{
if (empty($countryQuery)) 
{
echo "No country entered, displaying all countries.";
}
elseif (!(empty($countryQuery)))
{
echo "results from: <b>" .$countryQuery ."</b>";
}
}

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
