<?php
require_once("config.php");

$db = new mysqli($MYSQL_HOST, $MYSQL_USERNAME, $MYSQL_PASSWORD, $MYSQL_DBNAME);
if($db->connect_error) {
	exit("Не коннектит" . $db->connect_error);
}

function checkerr($var) {
	if ($var === false) {
		exit("Не могу выполнить ваш запрос");
	}
}

function top() {
	global $db;
	$statement = $db->prepare("SELECT name, descr FROM adverts LIMIT 5");
	checkerr($statement);
	checkerr($statement->execute());
	$res = $statement->get_result();
	checkerr($res);
	$adverts =[];
	while (($advert = $res->fetch_assoc()) !== null) {
		array_push($adverts, $advert);
	}
	$statement->close();
	return $adverts;
}

function get_advert($name) {
	global $db;
	$statement = $db->prepare("SELECT name, descr FROM adverts WHERE name = ?");
	checkerr($statement);
	$statement->bind_param("s", $name);
	checkerr($statement->execute());
	$res = $statement->get_result();
	checkerr($res);
	$advert = $res->fetch_assoc();
	$statement->close();
	return $advert;
}

function new_advert($name, $secret, $descr) {
	global $db;
	$statement = $db->prepare("INSERT INTO adverts (name, secret, descr) VALUES (?, ?, ?)");
	checkerr($statement);
	$statement->bind_param("sss", $name, $secret, $descr);
	checkerr($statement->execute());
	$statement->close();
}

function check_secret($name, $secret) {
	global $db;
	$valid = false;
	$statement = $db->prepare(
		"SELECT name FROM adverts WHERE name = ? AND secret = ?"
	);
	checkerr($statement);
	$statement->bind_param("ss", $name, $secret);
	checkerr($statement->execute());
	$res = $statement->get_result();
	checkerr($res);
	if ($res->fetch_assoc() !==null) {
		$valid = true;
	}
	$statement->close();
	return $valid;
}
?>
