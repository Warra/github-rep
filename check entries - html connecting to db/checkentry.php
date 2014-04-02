<?php
$username = 'root';
$password = '';
$result = '';
$entry ='';

if(isset($_POST['entry']))
{
	$entry = ($_POST['entry']);
}


try{
	//Connect, create query, bind parameters, execute statement
	$conn = new PDO('mysql:host=localhost;dbname=firstpdo', $username, $password);
	$query = 'SELECT * FROM table1 WHERE entry = :entry';
	$stmt = $conn->prepare($query);
	//echo $entry."<br>";
	$stmt->bindParam(':entry', $entry, PDO::PARAM_STR, 100);
	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$result = $result.$row['entry'].' - '.$row['datestamp'].'<br>';
		//echo $row['entry'].'<br>';
	}

//check whether result set is empty
	if($result == '')
	{
		echo 'entry not found';
	}
	else
	{

		echo "Your entries were:".'<br><br>'.$result;
	}
}
catch(PDOException $e){
	echo $e->getMessage();
}

//close connection
$conn = NULL;
?>