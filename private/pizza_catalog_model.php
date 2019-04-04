<?php

class pizza_catalog_model{
    private $mysql;

    public function __construct(){
    	$this->mysql = new mysqli('localhost', 'toro_pizza', 'thebestpizzaontheuniverse', 'toro_advertising');
    }

    public function get_pizzas($id_pizza){
    	if(!isset($id_pizza)){
			$query = 'SELECT * FROM pizzas';
		}else{
			$query = 'SELECT * FROM pizzas WHERE id_pizza = '. $id_pizza;
		}
    	$data = $this->mysql->query($query);
    	while($register = $data->fetch_assoc()){
            $id_pizza = $register['id_pizza'];
            unset($register['id_pizza']);
            $pizzas[$id_pizza] = $register;
        }

        return $pizzas;
    }

    public function get_pizzas_ingredients($pizzas){
        foreach($pizzas as $id_pizza => $pizza){
        	$query = 'SELECT * FROM ingredients WHERE id_ingredient IN(SELECT id_ingredient FROM recipes WHERE id_pizza = '. $id_pizza. ')';
	    	$data = $this->mysql->query($query);
	        while($register = $data->fetch_assoc()){
	            $ingredients[$id_pizza][$register['id_ingredient']] = $register;
	        }
        }

        return $ingredients;
    }

    public function get_all_ingredients(){
    	$query = 'SELECT * FROM ingredients';
    	$data = $this->mysql->query($query);
        while($register = $data->fetch_assoc()){
			$id_ingredient = $register['id_ingredient'];
            unset($register['id_ingredient']);
            $ingredients[$id_ingredient] = $register;
        }

        return $ingredients;
    }

    public function get_pizza_cost($ingredients){
    	$ingredients = json_decode($ingredients, true);
    	$query = 'SELECT SUM(cost) * 1.5  as total_cost FROM ingredients WHERE id_ingredient IN('. join(", ", $ingredients). ')';
		$data = $this->mysql->query($query);
    	$register = $data->fetch_assoc();
		
		return $register['total_cost'];
    }
}