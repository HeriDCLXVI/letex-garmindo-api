<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$pr_id = $data->pr_id;

	$response = array();

	$query = mysqli_query($link, "DELETE FROM tb_product WHERE pr_id = '$pr_id'");

	if ($query) {
		$response['error'] = false;
		$response['message'] = 'Data deleted!';
	}
	else {
		$response['error'] = true;
		$response['message'] = "Failed to delete data!";
	}

	echo json_encode($response);
?>