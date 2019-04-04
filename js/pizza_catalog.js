function order_pizza(id_pizza){
	var ajax_data = {ajax: "order_pizza", id_pizza: id_pizza}

	ajax_updater(ajax_data);
}

function remove_ingredient(ingredient_li_id){
	var ingredient_li = $(ingredient_li_id).remove();
	ingredient_li.removeChild(ingredient_li.childNodes[1]);
	ingredient_li.id = 'not_' + ingredient_li.id;
	$('not_added_ingredients_ul').insert(ingredient_li);
	generate_ingredients_selector_button('add', ingredient_li.id);
	recalculate_pizza_cost();
}

function add_ingredient(ingredient_li_id){
	var ingredient_li = $(ingredient_li_id).remove();
	ingredient_li.removeChild(ingredient_li.childNodes[1]);
	ingredient_li.id = ingredient_li.id.replace('not_', '');
	$('added_ingredients_ul').insert(ingredient_li);
	generate_ingredients_selector_button('remove', ingredient_li.id);
	recalculate_pizza_cost();
}

function generate_ingredients_selector_button(button_type, ingredient_li_id){
	var ajax_data = {ajax: 'generate_' + button_type + '_ingredient_button', ingredient_li_id: ingredient_li_id}
	new Ajax.Request('index.php', {
		parameters: ajax_data,
		onSuccess: function(response) {
			$(ingredient_li_id).insert(response.responseText);
	  	}
	});
}

function recalculate_pizza_cost(){
	var added_ingredients_ul = $('added_ingredients_ul');
	var ingredients = [];

	added_ingredients_ul.childElements().each(function(li){
		ingredients.push(li.id.replace('added_ingredient_', ''));
	});

	var ajax_data = {ajax: 'recalculate_pizza_cost', ingredients: JSON.stringify(ingredients)}

	new Ajax.Request('index.php', {
		parameters: ajax_data,
		onSuccess: function(response) {
			console.log(response.responseText);
			console.log($('pizza_cost').text);
			$('pizza_cost').textContent = response.responseText + '\u20AC';
	  	}
	});
}

function ajax_updater(data){
	new Ajax.Request('index.php', {
		parameters: data,
		onSuccess: function(response) {
			var body = $$('body');
	    	body = body[0];
	    	body.innerHTML = response.responseText;
	    	Sortable.create('added_ingredients_ul');
	  	}
	});
}