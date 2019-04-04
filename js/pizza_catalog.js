function order_pizza(id_pizza){
	var ajax_data = {ajax: "order_pizza", id_pizza: id_pizza}

	ajax_updater(ajax_data);
}

function ajax_updater(data){
	minAjax({
	    url:"index.php",
	    type:"POST",
	    data: data,
	    success: function(response){
	    	var body = document.getElementsByTagName('body');
	    	body = body[0];
	    	body.innerHTML = response;
	    }
  	});
}