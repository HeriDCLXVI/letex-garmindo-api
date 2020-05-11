<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$username = $data->username;
	$password = $data->password;

	$query = mysqli_query($link, "select * from tb_user where username = '$username' and password = '$password' limit 1");

	$row = mysqli_fetch_array($query);
	$user = array("user_id" => $row['user_id'],
		"username" => $row['username'],
		"password" => $row['password'],
		"role" => $row['role'],
		"block" => $row['block'],
	);
	echo json_encode($user);
?>