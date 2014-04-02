<?php
$username = 'root';
$password = '';
$entry = 'entry1';
$entryupdate = 'entry1update';

try{
	$conn = new PDO('mysql:host=localhost;dbname=firstpdo', $username, $password);
	$query = 'UPDATE table1 SET entry=:entryupdate WHERE entry=:entry';
	$stmt = $conn->prepare($query);
	$stmt->bindParam(':entryupdate', $entryupdate, PDO::PARAM_STR, 100);
	$stmt->bindParam(':entry', $entry, PDO::PARAM_STR, 100);
	$stmt->execute();

}
catch(PDOException $e){
	echo $e->getMessage();
}
$conn = NULL;
?>