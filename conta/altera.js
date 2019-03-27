$(document).ready (function (){
	// click no botão de entregue
	$(".entregue").click (function (){
		var dado = $(this).val ();
		$.ajax ({
			type: "POST",
			url: "entregue.php",
			data: {
				entrega: dado
			}
		}).done (function (event){
			$("#produto_" + dado).text (event);
		})
	})

	// click no botão de transito
	$(".transito").click (function (){
		var dado = $(this).val ();
		$.ajax ({
			type: "POST",
			url: "transito.php",
			data: {
				entrega: dado
			}
		}).done (function (event){
			$("#produto_" + dado).text (event);
		});
	});
	

	// click no botão de canelar
	$(".cance").click (function (){
		var dado = $(this).val ();
		$(window.document.location).attr('href',"cancelar.php?cancelar=" + dado);		
	})
})
