<?php
$username = 'root';
$password = '';
$entry = 'entry2';

try{
$conn = new PDO('mysql:host=localhost;dbname=firstpdo',$username,$password);
$query = 'DELETE FROM table1 WHERE entry=:entry';
$stmt = $conn->prepare($query);
$stmt ->bindParam(':entry', $entry, PDO::PARAM_STR, 100);
$stmt->execute();

}
catch(PDOException $e){
	echo $e->getMessage();
}
$conn = NULL;
?>