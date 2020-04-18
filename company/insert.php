<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$company_code = $data->company_code;
	$company_name = $data->company_name;
	$company_contact = $data->company_contact;
	$company_address = $data->company_address;
	$company_status = $data->company_status;
	$company_logo = $data->company_logo;
	$so_number = $data->so_number;

	$response = array();

	$query = mysqli_query($link, "INSERT INTO tb_company(company_code, company_name, company_contact, company_address, company_status, company_logo, so_number) VALUES ('$company_code', '$company_name', '$company_contact', '$company_address', '$company_status', '$company_logo', '$so_number')");

	if ($query) {
		$response['error'] = false;
		$response['message'] = 'Data berhasil disimpan!';
	}
	else {
		$response['error'] = true;
		$response['message'] = "Data gagal disimpan!";
	}

	echo json_encode($response);
?>