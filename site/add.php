<?php

require_once("db.php");
require_once("header.php");



function handle_post() {
	global $_POST;

	$name = $_POST["name"];
	$secret = $_POST["secret"];
	$descr = $_POST["descr"];

	if (isset($name) && $name !== ""
		&& isset($secret) && $secret !== ""
		&& isset($descr) && $descr !== "") {
	

    $advert = get_advert($name);
	if ($advert !== null) {
		return "Такое объявление уже есть. Свяжитесь с администратором";
	}

    new_advert($name, hash('sha256', $secret), $descr);

    echo "<p>Объявление было успешно добавлено</p>";
  }

	return null;
}

$error = handle_post();
if ($error !== null) {
	echo "<p>Error: " . $error . "</p>";
}
?>
<form action="/add.php" method="POST">
	Назовите объявление: <input type="text" maxlength="30" name="name" /><br />
	Пароль: <input type="password" name="secret" /><br />
	Описание: <input type="text" name="descr" /><br />
	<input type="submit" value="Add" />
</form>
