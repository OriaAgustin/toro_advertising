<?php

class pizza_catalog_view{
    private $pizza_catalog_view;
    private $pizza_catalog_model;

    public function __construct(){
    	//definir variables privadas
    }

    public function generate_pizza_catalog(){
    	

    	$html = $this->generate_html($pizza_catalog);
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