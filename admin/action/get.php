<?php

require_once(BASE_DIR . "src/Requester.php");
require_once(BASE_DIR . "src/UserDB.php");

$dbUser = new UserDB('localhost', 'u47538', '7904823', 'u47538');
$dbRequester = new Requester($dbUser);

if (
	empty($_SERVER['PHP_AUTH_USER']) ||
	empty($_SERVER['PHP_AUTH_PW']) ||
	!$dbRequester->adminAuth($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])
) {
	header('HTTP/1.1 401 Unanthorized');
	header('WWW-Authenticate: Basic realm="Test Authentication System"');
	echo '<h1>401 Требуется обязательная авторизация!</h1>';
	echo "<p>Вернуться на <a href='index.php' class='form__a'>главную</a>!</p>";

	exit();
}

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

if (!empty($action) && $action === 'delete' && !empty($id)) {
	$dbRequester->deleteUser($id);
}

require_once(BASE_DIR . "admin/layout/start.php");
require_once(BASE_DIR . "admin/layout/tableUser.php");
require_once(BASE_DIR . "admin/layout/tableSPs.php");
require_once(BASE_DIR . "admin/layout/tableStat.php");
require_once(BASE_DIR . "admin/layout/end.php");
