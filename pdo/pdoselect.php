<?php
$username = 'root';
$password = '';

try{
	$conn = new PDO('mysql:host=localhost;dbname=firstpdo',$username, $password);
	$query = 'SELECT entry, datestamp FROM table1';
	$stmt = $conn -> prepare($query);
	$stmt ->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $row['entry'].', '.$row['datestamp'].'<br>';
	}
}
catch(PDOException $e){
	echo $e->getMessage();
}
$conn = NULL;
?>