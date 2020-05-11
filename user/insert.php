<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$username = $data->username;
	$password = $data->password;
	$role = $data->role;
	$block = $data->block;

	$response = array();

	$query = mysqli_query($link, "INSERT INTO tb_user(username, password, role, block) VALUES ('$username', '$password', '$role', '$block')");

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