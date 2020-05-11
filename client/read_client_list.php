<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$query = mysqli_query($link, "select client_id, client_name from tb_client");

	$clients = array();

	while ($row = mysqli_fetch_array($query)) {
		$client = array(
			"client_id" => $row['client_id'],
			"client_name" => $row['client_name'],
		);
		array_push($clients, $client);
	}
	echo json_encode($clients);
?>