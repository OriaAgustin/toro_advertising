<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/private/controllers/pizza_catalog_controller.php');

$pizza_catalog_controller = new pizza_catalog_controller();

switch($_REQUEST['ajax']){
	default:
		$pizza_catalog_controller->generate_pizza_catalog();
}