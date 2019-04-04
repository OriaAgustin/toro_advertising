<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/private/pizza_catalog_controller.php');

$pizza_catalog_controller = new pizza_catalog_controller();

switch($_REQUEST['ajax']){
	case "order_pizza":
		print $pizza_catalog_controller->generate_order_pizza($_REQUEST['id_pizza']);
		break;
	case "generate_add_ingredient_button":
		print $pizza_catalog_controller->generate_add_ingredient_button($_REQUEST['ingredient_li_id']);
		break;
	case "generate_remove_ingredient_button":
		print $pizza_catalog_controller->generate_remove_ingredient_button($_REQUEST['ingredient_li_id']);
		break;
	case "recalculate_pizza_cost":
		print $pizza_catalog_controller->recalculate_pizza_cost($_REQUEST['ingredients']);
		break;
	default:
		print $pizza_catalog_controller->generate_pizza_catalog();
}