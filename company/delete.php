<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$company_id = $data->company_id;

	$response = array();

	$query = mysqli_query($link, "DELETE FROM tb_company WHERE company_id = '$company_id'");

	if ($query) {
		$response['error'] = false;
		$response['message'] = 'Data berhasil dihapus!';
	}
	else {
		$response['error'] = true;
		$response['message'] = "Data gagal dihapus!";
	}

	echo json_encode($response);
?>