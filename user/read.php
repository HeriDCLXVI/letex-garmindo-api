<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	if ($data) {
		$user_id = $data->user_id;
		$query = mysqli_query($link, "select * from tb_user where user_id = '$user_id'");

		$row = mysqli_fetch_array($query);
		$user = array("user_id" => $row['user_id'],
			"username" => $row['username'],
			"password" => $row['password'],
			"role" => $row['role'],
			"block" => $row['block'],
		);
		echo json_encode($user);
	}
	else {
		$query = mysqli_query($link, "select * from tb_user");

		$users = array();

		while ($row = mysqli_fetch_array($query)) {
			$user = array(
				"user_id" => $row['user_id'],
				"username" => $row['username'],
				"password" => $row['password'],
				"role" => $row['role'],
				"block" => $row['block'],
			);
			array_push($users, $user);
		}
		echo json_encode($users);
	}
?>