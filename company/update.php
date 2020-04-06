<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$company_id = $data->company_id;
	$company_code = $data->company_code;
	$company_name = $data->company_name;
	$company_contact = $data->company_contact;
	$company_address = $data->company_address;
	$company_status = $data->company_status;
	$company_logo = $data->company_logo;

	$response = array();

	$query = mysqli_query($link, "UPDATE tb_company SET company_code = '$company_code', company_name = '$company_name', company_contact = '$company_contact', company_address = '$company_address', company_status = '$company_status', company_logo = '$company_logo' WHERE company_id = '$company_id'");

	if ($query) {
		$response['error'] = false;
		$response['message'] = 'Data berhasil diubah!';
	}
	else {
		$response['error'] = true;
		$response['message'] = "Data gagal diubah!";
	}

	echo json_encode($response);
?>