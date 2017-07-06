
<?php

    $dbHost = 'sql107.mywebs.host';
    $dbUsername = 'mwh00_20178630';
    $dbPassword = 'laxmiganapathi';
    $dbName = 'mwh00_20178630_kft';

//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_REQUEST['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM skills WHERE skill LIKE '%".$searchTerm."%' ORDER BY skill ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['skill'];
}
//return json data
echo json_encode($data);
?>
