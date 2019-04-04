<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/private/controllers/pizza_catalog_controller.php');

$pizza_catalog_controller = new pizza_catalog_controller();

switch($_REQUEST['ajax']){
	case "order_pizza":
		print $pizza_catalog_controller->generate_order_pizza($_REQUEST['id_pizza']);
		break;
	default:
		print $pizza_catalog_controller->generate_pizza_catalog();
}