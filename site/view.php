
<?php

require_once("db.php");
require_once("header.php");

function handle_post() {
	global $_POST;
	$name = $_POST["name"];
	$secret = $_POST["secret"];

	if (isset($name) && $name !== "" 
		&& isset($secret) && $secret !== "") {
		if (check_secret($name, hash('sha256', $secret)) === false) {
			return "Неправильное имя или пароль к объявлению";
		}
		
		$advert = get_advert($name);
		
		echo "<p>Детали объявления:";
		echo "<ul><li>" . htmlentities($advert['name']) . "</li>";
		echo "<li>" . htmlentities($advert['descr']) . "</li></ul></p>";
	}
	
	return null;
}
$error = handle_post();
if ($error !== null) {
  echo "<p>Ошибка: " . $error . "</p>";
}
?>
<form action="/view.php" method="POST">
	Название: <input type="text" maxlength="30" name="name" /><br />
	Пароль: <input type="password" name="secret" /><br />
	<input type="submit" value="View" />
</form>
