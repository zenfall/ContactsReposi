<?php

require_once 'controller/ContactsController.php';
error_reporting(-1);
ini_set('display_errors', 'On');
$controller = new ContactsController();

$controller->handleRequest();

?>
