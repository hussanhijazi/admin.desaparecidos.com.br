var control_timeout, footerHeight;
$(document).foundation();
$(document).ready(function(){
	$("html").niceScroll({ autohidemode: false });
	$('#menu').localScroll({hash:true, onAfterFirst:function(){$('html, body').scrollTo( {top:'-=25px'}, 'fast' );}});
	$('.flexslider').flexslider({
      animation: "fade",
      directionNav: true,
      controlNav: false,
      pauseOnAction: true,
      pauseOnHover: true,
      direction: "horizontal",
      slideshowSpeed: 5500
    });
	
	$('#button-send').click(function(event){
		$('#error').html("");
		$('#button-send').html('Enviando E-Mail...');
		event.preventDefault();
		
		$('html, body').scrollTo( $('#contato'), 'fast' );
		
		$.ajax({
			type: 'POST',
			url: '/contato',
			data: $('#contactform').serialize(),
			success: function(html) {
				if(html == '1')
				{
					$('#button-send').html('Enviar');
					$('#success').show();
					$('#error').hide();
				}
				else
				{
					str = "";
					obj = JSON.parse(html);
					if(typeof obj.nome !== 'undefined')
						str += "Digite o nome<br>";						
					if(typeof obj.email !== 'undefined')
						str += "Digite um Email válido<br>";						
					if(typeof obj.mensagem !== 'undefined')
						str += "Digite uma mensagem";		


					$('#nome').val("");
					$('#email').val("");
					$('#mensagem').val("");
					$('#error').html(str);
					$('#button-send').html('Enviar');
					$('#error').show();
					$('#success').hide();
				}					
			},
			error: function(error){
				$('#button-send').html('Enviar');

				$('#error').show();
				$('#success').hide();
			}
		});
		
	});
	
	
});


function valemail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
