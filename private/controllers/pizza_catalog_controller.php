<?php

require_once($_SERVER['DOCUMENT_ROOT']. '/private/views/pizza_catalog_view.php');
require_once($_SERVER['DOCUMENT_ROOT']. '/private/models/pizza_catalog_model.php');

class pizza_catalog_controller{
    private $pizza_catalog_view;
    private $pizza_catalog_model;

    public function __construct(){
    	$this->pizza_catalog_view = new pizza_catalog_view();
    	$this->pizza_catalog_model = new pizza_catalog_model();
    }

    public function generate_pizza_catalog(){
    	return $this->pizza_catalog_view->generate_pizza_catalog();
    }
}