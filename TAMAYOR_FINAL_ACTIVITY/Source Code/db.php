<?php

define('DB_SERVER', 'sql306.epizy.com');
define('DB_USERNAME', 'epiz_32993571');
define('DB_PASSWORD', 'PfTQNjhGhy5xS');
define('DB_NAME', 'epiz_32993571_201980061');


try {
	$pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
	die("ERROR: Could not connect. " . $e->getMessage());
}