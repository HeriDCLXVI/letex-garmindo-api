<?php
	header("Access-Control-Allow-Origin: *");

	include "../config/connect.php";

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
		);
		array_push($companies, $company);
	}

	echo json_encode($companies);
?>