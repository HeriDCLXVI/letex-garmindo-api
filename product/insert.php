<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$client_id = $data->client_id;
	$cat_id = $data->cat_id;
	$pr_name = $data->pr_name;
	$style = $data->style;
	$sell_price = $data->sell_price;
	$pr_description = $data->pr_description;
	$pr_picture = $data->pr_picture;

	$response = array();

	$client_query = mysqli_query($link, "SELECT * FROM tb_client WHERE client_id = '$client_id'");
	$category_query = mysqli_query($link, "SELECT * FROM tb_category WHERE cat_id = '$cat_id'");
	if (mysqli_num_rows($client_query) != 1) {
		$response['error'] = false;
		$response['message'] = 'Client not found!';
	}
	else if (mysqli_num_rows($category_query) != 1) {
		$response['error'] = false;
		$response['message'] = 'Category not found!';
	}
	else {
		$query = mysqli_query($link, "INSERT INTO tb_product(client_id, cat_id, pr_name, style, sell_price, pr_description, pr_picture) VALUES ('$client_id', '$cat_id', '$pr_name', '$style', '$sell_price', '$pr_description', '$pr_picture')");

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