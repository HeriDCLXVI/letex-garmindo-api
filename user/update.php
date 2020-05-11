<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$user_id = $data->user_id;
	$role = $data->role;
	$block = $data->block;

	$response = array();

	$query = mysqli_query($link, "UPDATE tb_user SET password = '$password', role = '$role', block = '$block' WHERE user_id = '$user_id'");

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