<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	if ($data) {
		$client_id = $data->client_id;
		$query = mysqli_query($link, "select * from tb_client where client_id = '$client_id'");

		$row = mysqli_fetch_array($query);
		$client = array(
			"client_id" => $row['client_id'],
			"client_name" => $row['client_name'],
			"client_contact" => $row['client_contact'],
			"client_date_register" => $row['client_date_register'],
			"company_id" => $row['company_id'],
		);
		echo json_encode($client);
	}
	else {
		$query = mysqli_query($link, "select tb_company.company_name, tb_client.client_id, tb_client.client_name, tb_client.client_contact, tb_client.client_date_register, tb_client.company_id from tb_client left join tb_company on tb_client.company_id = tb_company.company_id");

		$clients = array();

		while ($row = mysqli_fetch_array($query)) {
			$client = array(
				"company_name" => $row['company_name'],
				"client_id" => $row['client_id'],
				"client_name" => $row['client_name'],
				"client_contact" => $row['client_contact'],
				"client_date_register" => $row['client_date_register'],
				"company_id" => $row['company_id'],
			);
			array_push($clients, $client);
		}
		echo json_encode($clients);
	}
?>