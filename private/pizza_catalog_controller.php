<?php

require_once($_SERVER['DOCUMENT_ROOT']. '/private/pizza_catalog_view.php');
require_once($_SERVER['DOCUMENT_ROOT']. '/private/pizza_catalog_model.php');

class pizza_catalog_controller{
    private $pizza_catalog_view;
    private $pizza_catalog_model;

    public function __construct(){
    	$this->pizza_catalog_view = new pizza_catalog_view();
    	$this->pizza_catalog_model = new pizza_catalog_model();
    }

    public function generate_pizza_catalog(){
    	$pizzas = $this->pizza_catalog_model->get_pizzas();
    	$ingredients = $this->pizza_catalog_model->get_pizzas_ingredients($pizzas);
    	
    	return $this->pizza_catalog_view->generate_pizza_catalog($pizzas, $ingredients);
    }

    public function generate_order_pizza($id_pizza){
    	$pizza = $this->pizza_catalog_model->get_pizzas($id_pizza);
    	$added_ingredients = $this->pizza_catalog_model->get_pizzas_ingredients($pizza);
    	$ingredients = $this->pizza_catalog_model->get_all_ingredients();

    	return $this->pizza_catalog_view->generate_order_pizza($id_pizza, $pizza[$id_pizza], $added_ingredients[$id_pizza], $ingredients);
    }

	public function generate_add_ingredient_button($ingredient_li_id){
		return $this->pizza_catalog_view->generate_add_ingredient_button($ingredient_li_id);
	}

	public function generate_remove_ingredient_button($ingredient_li_id){
		return $this->pizza_catalog_view->generate_remove_ingredient_button($ingredient_li_id);
	}

	public function recalculate_pizza_cost($ingredients){
		return $this->pizza_catalog_model->get_pizza_cost($ingredients);
	}

    public function generate_ok_message(){
        return $this->pizza_catalog_view->generate_ok_message();
    }
}