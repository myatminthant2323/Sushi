<?php  
	
	$id = $_POST['id'];

	// get jsonData from jsonfile 
	$jsonData = file_get_contents('sushi_list.json');

	// convert into array from json
	$data_arr = json_decode($jsonData);

	// delete
	unset($data_arr[$id]); 

	// convert into json again
	$jsonData = json_encode($data_arr, JSON_PRETTY_PRINT);

	file_put_contents('sushi_list.json', $jsonData);
	// header("Refresh:0; url=index.php");
	header("location:index.php");

?>