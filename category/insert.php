<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$cat_name = $data->cat_name;

	$response = array();

	$query = mysqli_query($link, "INSERT INTO tb_category(cat_name) VALUES ('$cat_name')");

	if ($query) {
		$response['error'] = false;
		$response['message'] = 'Data saved!';
	}
	else {
		$response['error'] = true;
		$response['message'] = "Failed to save data!";
	}

	echo json_encode($response);
?>