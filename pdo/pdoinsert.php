<?php
$host = 'localhost';
$dbname = 'firstpdo';
$username = 'root';
$password = '';
$entry = 'entry2';
$date = time();

try{
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
$query = "INSERT INTO table1(entry, datestamp) VALUES(:entry, NOW())";
$stmt = $conn -> prepare($query);
$stmt ->bindParam(':entry', $entry, PDO::PARAM_STR);
$stmt ->execute();
echo 'entry successful!';
} catch (PDOException $e) {
  echo "DataBase Error: The entry could not be added.<br>".$e->getMessage();
}

$conn = NULL;
?>
