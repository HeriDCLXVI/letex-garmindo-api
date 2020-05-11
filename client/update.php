<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$client_id = $data->client_id;
	$client_name = $data->client_name;
	$client_contact = $data->client_contact;
	$company_id = $data->company_id;

	$response = array();

	$query = mysqli_query($link, "UPDATE tb_client SET client_name = '$client_name', client_contact = '$client_contact', company_id = '$company_id' WHERE client_id = '$client_id'");

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