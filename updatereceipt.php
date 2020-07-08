<?php  

	$id = $_POST['editid'];
	$name = $_POST['editname'];
	$price = $_POST['editprice'];
	$category = $_POST['editcategory'];
	

	// profile
	$oldprofile = $_POST['oldprofilename'];

	$newprofile = $_FILES['newprofile'];
	$newprofilename = $newprofile['name'];

	// echo "$id $name $email $gender $address $oldprofile $newprofilename";

	if ($newprofile['size'] > 0) {
		$basepath = "images/";
		$fullpath = $basepath.$newprofilename;
		move_uploaded_file($newprofile['tmp_name'], $fullpath);
	} else {
		$fullpath = $oldprofile; 
	}

	$menu = array(
		"photo" => $fullpath,
		"name" => $name,
		"price" => number_format($price),
		"category" => number_format($category),
		
	);

	// get jsonData from jsonfile 
	$jsonData = file_get_contents('sushi_list.json');

	if (!$jsonData) {
		$jsonData = '[]';
	}
	// var_dump($jsonData);
	// convert into array from json
	$data_arr = json_decode($jsonData, true);

	// edit in array
	// var_dump($data_arr);
	// die;
	$data_arr[$id] = $menu;

	// convert into json again
	$jsonData = json_encode($data_arr, JSON_PRETTY_PRINT);

	file_put_contents('sushi_list.json', $jsonData);
	header("location:index.php");

?>