<?php

set_include_path('/.'.PATH_SEPARATOR.get_include_path());

require_once 'Zend/Db.php';

$config = include 'config.php';

try {
	$db = Zend_Db::factory($config["adapter"],$config["config"]);
	$db->getConnection();
} catch (Zend_Db_Adapter_Exception $e) {
	var_dump($e);
	exit();
	throw new Exception("Erreur de connexion à la base de données",500);
} catch (Zend_Exception $e) {
	throw new Exception("Erreur d'initialisation de la base de données",500);
}

$db->query("SET NAMES 'utf8'");

return $db;