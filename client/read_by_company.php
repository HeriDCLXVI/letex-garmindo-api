<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";
	$data = json_decode(file_get_contents("php://input"));

	$company_id = $data->company_id;

	$query = mysqli_query($link, "select * from tb_client where company_id = '$company_id'");

	$clients = array();

	while ($row = mysqli_fetch_array($query)) {
		$client = array(
			"client_id" => $row['client_id'],
			"client_name" => $row['client_name'],
			"client_contact" => $row['client_contact'],
			"client_date_register" => $row['client_date_register'],
			"company_id" => $row['company_id'],
		);
		array_push($clients, $client);
	}
	echo json_encode($clients);
?>