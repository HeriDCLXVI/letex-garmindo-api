<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$company_id = $data->company_id;
	$so_number = $data->so_number;

	$response = array();

	$query = mysqli_query($link, "UPDATE tb_company SET so_number = '$so_number' WHERE company_id = '$company_id'");

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