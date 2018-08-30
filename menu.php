<?php

session_start();
if(isset($_POST["Email"])){
    $_SESSION["maSession"]="user";

}
require_once 'controller/ContactsController.php';
error_reporting(-1);
ini_set('display_errors', 'On');
$controller = new ContactsController();

$controller->handleRequest();

?>
