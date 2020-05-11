<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";
	$data = json_decode(file_get_contents("php://input"));

	$client_id = $data->client_id;

	$query = mysqli_query($link, "select * from tb_product where client_id = '$client_id'");

	$products = array();

	while ($row = mysqli_fetch_array($query)) {
		$product = array(
			"pr_id" => $row['pr_id'],
			"client_id" => $row['client_id'],
			"cat_id" => $row['cat_id'],
			"pr_name" => $row['pr_name'],
			"style" => $row['style'],
			"sell_price" => $row['sell_price'],
			"pr_description" => $row['pr_description'],
			"pr_picture" => $row['pr_picture'],
		);
		array_push($products, $product);
	}
	echo json_encode($products);
?>