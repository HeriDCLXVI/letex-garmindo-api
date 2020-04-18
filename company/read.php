<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	if ($data) {
		$company_id = $data->company_id;
		$query = mysqli_query($link, "select * from tb_company where company_id = '$company_id'");

		$row = mysqli_fetch_array($query);
		$company = array(
			"company_id" => $row['company_id'],
			"company_code" => $row['company_code'],
			"company_name" => $row['company_name'],
			"company_contact" => $row['company_contact'],
			"company_address" => $row['company_address'],
			"company_status" => $row['company_status'],
			"company_logo" => $row['company_logo'],
			"so_number" => $row['so_number'],
		);
		echo json_encode($company);
	}
	else {
		$query = mysqli_query($link, "select * from tb_company");

		$companies = array();

		while ($row = mysqli_fetch_array($query)) {
			$company = array(
				"company_id" => $row['company_id'],
				"company_code" => $row['company_code'],
				"company_name" => $row['company_name'],
				"company_contact" => $row['company_contact'],
				"company_address" => $row['company_address'],
				"company_status" => $row['company_status'],
				"company_logo" => $row['company_logo'],
				"so_number" => $row['so_number'],
			);
			array_push($companies, $company);
		}
		echo json_encode($companies);
	}
?>