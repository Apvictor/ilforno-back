var App = function (){
	
	var add_mensagem = function(){
		$('.btn-enviar-mensagem').on('click', function(){
			var order_id = $('#order_id').val();
			var user_id_destionation = $('#user_id_destionation').val();
			var user_id = $('#user_id').val();
			var message = $('#message').val();

			if(message.length>0){

			//alert(message + '--' + user_id_destionation);

				$.ajax({
					url: BASE_URL + 'restrita/pedidos/mensagem',
					type:'POST',
					dataType: 'json',
					data: {
						"order_id": order_id,
						"user_id_destionation": user_id_destionation,
						"roles": 2,
						"user_id": user_id,
						"message" : message
					},
					beforeSend: function(){
						$('.btn-enviar-mensagem').html('Enviando');
					},
					complete: function(){
						var div = document.getElementById('rolagem');
				         $('#' + 'rolagem').animate({
				            scrollTop: div.scrollHeight - div.clientHeight+50
				         }, 500);
					},

				}).then(function(response){
					$('#rolagem').load(' #rolagem > * ');
					$('#message').val('');
					$('.btn-enviar-mensagem').html('Enviar');
					

					console.log(response);

				});	
			}
		});
	}

	return {
		init: function(){
			add_mensagem();
		}
	}


}();

jQuery(document).ready(function(){
	$(window).keydown(function(event){
		if(event.keyCode == 13){
			event.preventDefault();
			return false;
		}
	});

	App.init();

});