<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$pr_id = $data->pr_id;
	$client_id = $data->client_id;
	$cat_id = $data->cat_id;
	$style = $data->style;
	$sell_price = $data->sell_price;
	$pr_description = $data->pr_description;
	$pr_picture = $data->pr_picture;

	$response = array();

	if ($pr_picture) {
		$query = mysqli_query($link, "UPDATE tb_product SET client_id = '$client_id', cat_id = '$cat_id', style = '$style', sell_price = '$sell_price', pr_description = '$pr_description', pr_picture = '$pr_picture' WHERE pr_id = '$pr_id'");
	}
	else {
		$query = mysqli_query($link, "UPDATE tb_product SET client_id = '$client_id', cat_id = '$cat_id', style = '$style', sell_price = '$sell_price', pr_description = '$pr_description' WHERE pr_id = '$pr_id'");
	}

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