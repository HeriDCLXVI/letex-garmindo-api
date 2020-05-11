<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$client_name = $data->client_name;
	$client_contact = $data->client_contact;
	$client_date_register = $data->client_date_register;
	$company_id = $data->company_id;

	$response = array();

	$company_query = mysqli_query($link, "SELECT * FROM tb_company WHERE company_id = '$company_id'");
	if (mysqli_num_rows($company_query) != 1) {
		$response['error'] = false;
		$response['message'] = 'Company not found!';
	}
	else {
		$query = mysqli_query($link, "INSERT INTO tb_client(client_name, client_contact, client_date_register, company_id) VALUES ('$client_name', '$client_contact', '$client_date_register', '$company_id')");

		if ($query) {
			$response['error'] = false;
			$response['message'] = 'Data saved!';
		}
		else {
			$response['error'] = true;
			$response['message'] = "Failed to save data!";
		}
	}

	echo json_encode($response);
?>