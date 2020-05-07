<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	if ($data) {
		$cat_id = $data->cat_id;
		$query = mysqli_query($link, "select * from tb_category where cat_id = '$cat_id'");

		$row = mysqli_fetch_array($query);
		$category = array(
			"cat_id" => $row['cat_id'],
			"cat_name" => $row['cat_name'],
		);
		echo json_encode($category);
	}
	else {
		$query = mysqli_query($link, "select * from tb_category");

		$companies = array();

		while ($row = mysqli_fetch_array($query)) {
			$category = array(
				"cat_id" => $row['cat_id'],
				"cat_name" => $row['cat_name'],
			);
			array_push($companies, $category);
		}
		echo json_encode($companies);
	}
?>