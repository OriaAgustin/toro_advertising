<?php

class pizza_catalog_view{
    private $pizza_catalog_view;
    private $pizza_catalog_model;

    public function __construct(){
    	//definir variables privadas
    }

    public function generate_pizza_catalog($pizzas, $ingredients){
    	foreach($pizzas as $id_pizza => $pizza){
    		$pizza_name = '<h4>'. $pizza['name']. '</h4>';
    		$pizza_cost = $pizza['cost'];
    		$pizza_image = '<img src="/img/'. $id_pizza. '.jpg" alt="'. $pizza['name']. '">'; 
    		$pizza_ingredients = join(" ,", $ingredients[$id_pizza]);
    		$pizza_divs[] = '<div>'. $pizza_name. $pizza_image. $pizza_cost. $pizza_ingredients. '</div>';
    	}
    	$pizza_catalog = join("", $pizza_divs);
    	$html = $this->generate_html($pizza_catalog);
    	
    	return $html;
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
        $links .= '<link rel="stylesheet" type="text/css" href="/css/pizza_catalog.css">';
        $title = '<title>TORO\'S PIZZA</title>';
        $meta = '<meta charset="utf-8"/>';
        $head = '<head>'. $meta. $links. $title. '</head>';

        return $head;
    }

    private function generate_body($inner_html){
        $body = '<body>'. $inner_html. '</body>';

        return $body;
    }
}