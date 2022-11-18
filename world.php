<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$countryQuery = $_GET['country'];
// $cityQuery = $_GET['city'];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$countryQuery%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


/* IRRELEVANT TESTING IF METHODS/VARIABLE WERE 'GETTING' PROPERLY
if (isset($_GET['city'])) {echo "yes";}
else {echo "no";}
*/

if ( (isset($_GET['country'])) && (!(isset($_GET['city']))) ) 
{
if (empty($countryQuery)) 
{
echo "No country entered, displaying all countries.";
}
elseif (!(empty($countryQuery)))
{
echo "Results from: <b>" .$countryQuery . ".</b> <br>";
}

echo "<table style = 'border :100px'>
<tr> 
<th>Country Name</th> <th>Continent</th> <th>Year of Independence</th> <th>Head of State</th>
</tr>";

foreach ($results as $table): 
echo 
"<tr> 
<td>" . $table['name'] ."</td>" 
."<td>" . $table['continent'] . "</td>" 
."<td>" . $table['independence_year'] . "</td>"
."<td>" . $table['head_of_state'] . "</td>"
."</tr>";
endforeach;
echo "</table>";
}


elseif (isset($_GET['city'])) 
{
$cityQuery = $_GET['city'];
$stmt2 = $conn->query("SELECT cities.name AS citn, cities.district AS citd, cities.population AS citp, countries.name AS conName FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%$countryQuery%'");
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if (empty($countryQuery)) 
{
echo "No country entered, displaying all countries.";
}
elseif (!(empty($cityQuery)))
{
echo "Results from: <b>" .$countryQuery . ".</b> <br>";

echo 
"<table style = 'border : 100px blue;'>
<tr style ='text-align: middle; vertical-align: middle;'>
<th>City Name</th> <th>District</th> <th>Population</th>
</tr>";

foreach ($results2 as $table): 
{

echo 
"<tr>
<td>" . $table['citn'] . "</td>
<td>" .$table['citd'] . "</td>
<td>" .$table['citp'] ."</td>
</tr>";
}
endforeach;
echo "</table>";
}
}

?>

<?php

/*IRRELEVANT I THINK

if (isset($_GET['city'])) 
{
echo "<table border ='100px'>";
echo 
"<tr> 
<th>Country Name</th> <th>Continent</th> <th>Year of Independence</th> <th>Head of State</th>
</tr>";

foreach ($results as $table): 
echo 
"<tr> 
<td>" . $table['name'] ."</td>" 
."<td>" . $table['continent'] . "</td>" 
."<td>" . $table['independence_year'] . "</td>"
."<td>" . $table['head_of_state'] . "</td>"
."</tr>";
endforeach;
echo "</table>";
}
*/

?>


<?php
/*
EDITED OUT AFTER EXERCISE 3
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
*/
?>