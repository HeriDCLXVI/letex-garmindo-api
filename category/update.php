<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$cat_id = $data->cat_id;
	$cat_name = $data->cat_name;

	$response = array();

	$query = mysqli_query($link, "UPDATE tb_category SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'");

	if ($query) {
		$response['error'] = false;
		$response['message'] = 'Data updated!';
	}
	else {
		$response['error'] = true;
		$response['message'] = "Failed to update data!";
	}

	echo json_encode($response);
?>