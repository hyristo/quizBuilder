<?php

	include_once( '../config.php' );

	$db_host = DB_HOST;
	$db_pass = DB_PASSWORD;
	$db_user = DB_USER;
	$db_name = DB_NAME;

    $mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
    //$encrypted_conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die(mysqli_connect_error());

	//mysqli_select_db($encrypted_conn,$db_name) or die(mysqli_error($encrypted_conn));

    global $mysqli;
?>