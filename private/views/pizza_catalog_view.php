<?php

class pizza_catalog_view{

    public function __construct(){
    	
    }

    public function generate_pizza_catalog($pizzas, $ingredients){
    	foreach($pizzas as $id_pizza => $pizza){
    		$pizza_name = '<h4 class="pizza_name">'. $pizza['name']. '</h4>';
    		$pizza_image = '<img src="/img/'. $id_pizza. '.jpg" alt="'. $pizza['name']. '" class="pizza_image">';
    		$pizza_cost = '<p class="pizza_cost">'. $pizza['cost']. '&euro;</p>';
    		$pizza_ingredients = $this->format_ingredients($ingredients[$id_pizza]);
    		$order_button = '<input type="button" value="Ordenar esta pizza" onclick="order_pizza('. $id_pizza. ');" class="order_button">';
    		$pizza_divs[] = '<div class="pizza_div">'. $pizza_name. $pizza_image. $pizza_cost. $pizza_ingredients. $order_button. '</div>';
    	}
    	$pizza_catalog = '<div id="pizza_catalog">'. join("", $pizza_divs). '</div>';

    	$html = $this->generate_html($pizza_catalog);
    	
    	return $html;
    }

    private function format_ingredients($ingredients){
    	$last_ingredient  = array_pop($ingredients);
    	$last_ingredient = $last_ingredient['name'];

    	foreach($ingredients as $ingredient){
			$ingredients_names[] = $ingredient['name'];
		}

    	$ingredients_string = join(', ', $ingredients_names);
		$ingredients_string .= ' y '. $last_ingredient. '.';
		
		return '<p class="pizza_ingredients">'. $ingredients_string. '</p>';
    }

    public function generate_order_pizza($id_pizza, $pizza, $added_ingredients, $ingredients){
    	$pizza_name = '<h4 class="pizza_name">'. $pizza['name']. '</h4>';
    	$pizza_image = '<img src="/img/'. $id_pizza. '.jpg" alt="'. $pizza['name']. '" class="pizza_image">';
    	$pizza_cost = '<p class="pizza_cost">'. $pizza['cost']. '&euro;</p>';

		$not_added_ingredients = array_diff_assoc($ingredients, $added_ingredients);
		$added_ingredients = $this->generate_added_ingredients($added_ingredients);
		$not_added_ingredients = $this->generate_not_added_ingredients($not_added_ingredients);
		$ingredients_selector = '<div id="ingredients_selector">'. $added_ingredients. $not_added_ingredients. '</div>';

		$order_pizza = '<div id="order_pizza">'. $pizza_name. $pizza_image. $pizza_cost. $ingredients_selector. '</div>';

		$html = $this->generate_html($order_pizza);

		return $html;
    }

    private function generate_added_ingredients($added_ingredients){
    	foreach($added_ingredients as $key => $added_ingredient){
			$remove_ingredient_button = '<input type="button" value="x" onclick="remove_ingredient('. $id_pizza. ');" class="ingredients_selector_remove_button">';
			$added_ingredients_lis[] = '<li id="added_ingredient_'. $key. '" class="ingredient_li"><div class="ingredient_div">'. $added_ingredient['name']. '</div>'. $remove_ingredient_button. '</li>';
		}
		$added_ingredients = '<ul class="ingredients_ul">'. join("", $added_ingredients_lis). '</ul>';
		$added_ingredients_title = '<h4>Tu pizza ya tiene...</h4>'; 
		$added_ingredients = '<div class="ingredients_selector_container">'. $added_ingredients_title. $added_ingredients. '</div>';

		return $added_ingredients;
    }

    private function generate_not_added_ingredients($not_added_ingredients){
    	foreach($not_added_ingredients as $key => $not_added_ingredient){
			$add_ingredient_button = '<input type="button" value="+" onclick="add_ingredient('. $id_pizza. ');" class="ingredients_selector_add_button">';
			$not_added_ingredients_lis[] = '<li id="not_added_ingredient_'. $key. '" class="ingredient_li"><div class="ingredient_div">'. $not_added_ingredient['name']. '</div>'. $add_ingredient_button. '</li>';
		}
		$not_added_ingredients = '<ul class="ingredients_ul">'. join("", $not_added_ingredients_lis). '</ul>';
		$not_added_ingredients_title = "<h4>Tu pizza podr&iacute;a tener...</h4>";
		$not_added_ingredients = '<div class="ingredients_selector_container">'. $not_added_ingredients_title. $not_added_ingredients. '</div>';

		return $not_added_ingredients;
    }

    private function generate_html($inner_html){
    	$head = $this->generate_head();
        $body = $this->generate_body($inner_html);
    	$html = '<!DOCTYPE html><html lang="es">'. $head. $body. '</html>';

    	return $html;
    }

    private function generate_head(){
        $links = '<script src="/js/pizza_catalog.js"></script>';
        $links .= '<script src="/js/minAjax.js"></script>';
        $links .= '<script src="/js/prototype.js"></script>';
        $links .= '<script src="/js/scriptaculous.js"></script>';
        $links .= '<link rel="stylesheet" type="text/css" href="/css/pizza_catalog.css">';
        $title = '<title>TORO PIZZA</title>';
        $meta = '<meta charset="utf-8"/>';
        $head = '<head>'. $meta. $links. $title. '</head>';

        return $head;
    }

    private function generate_body($inner_html){
        $body = '<body>'. $inner_html. '</body>';

        return $body;
    }
}