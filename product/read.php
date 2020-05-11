<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	if ($data) {
		$pr_id = $data->pr_id;
		$query = mysqli_query($link, "select tb_product.*, tb_client.client_id, tb_category.cat_id from tb_product left join tb_category on tb_category.cat_id = tb_product.cat_id left join tb_client on tb_client.client_id = tb_product.client_id where pr_id = '$pr_id'");

		$row = mysqli_fetch_array($query);
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
		echo json_encode($product);
	}
	else {
		$query = mysqli_query($link, "select tb_product.*, tb_client.client_name, tb_category.cat_name from tb_product left join tb_category on tb_category.cat_id = tb_product.cat_id left join tb_client on tb_client.client_id = tb_product.client_id");

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
				"client_name" => $row['client_name'],
				"cat_name" => $row['cat_name'],
			);
			array_push($products, $product);
		}
		echo json_encode($products);
	}
?>