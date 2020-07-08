<?php
	$name = $_POST['new_name'];
	$price = $_POST['new_price'];
	$category = $_POST['new_category'];
	$photo = $_FILES['new_photo'];
	$photoname = $photo['name'];


	// echo "name > ".$name;
	// echo "price > ".$price;
	// echo "category > ".$category;
	// echo "photo > ".$photo;
	// echo "photoname > ".$photoname;

	//upload file
	$basepath = "images/";
	//photo/one.jpg
	$fullpath = $basepath . $photoname;
	// echo $fullpath;
	move_uploaded_file($photo['tmp_name'], $fullpath);

	$menu = array(
		"photo" => $fullpath,
		"name" => $name,
		"price" => number_format($price),
		"category" => number_format($category),
	);
	//get JSON Data from JSON File
	$jsondata = file_get_contents('sushi_list.json');
	if(!$jsondata){
		$jsondata = '[]';
	}	
	//convert into array from json
	$data_arr = json_decode($jsondata);
	var_dump($data_arr);
	array_push($data_arr, $menu);
	$jsondata = json_encode($data_arr, JSON_PRETTY_PRINT);
	file_put_contents('sushi_list.json', $jsondata);
	header("location:index.php");
?>