// função principal do js
function principal (event){
	// funções eventos

		// valida email
	function validEmail(value) {
	    var valid = true;  
	    var emails = value.replace(';', ',').split(",");  
	  
	    jQuery.each(emails, function () {  
	        if (jQuery.trim(this) != '')  
	        {  
	            if (!jQuery.trim(this).match(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i))  
	                valid = false;  
	        }  
	    });  
	    return valid;  
	};		

	function emailacao (event){
		if (validEmail (email.val ())){
			email.removeClass ("bg-danger");
		}
		else {
			email.addClass ("form-control mr-3 mt-4 bg-danger");
		}
	}

	// valida sobre nome
	function validanome (dado){
		if (dado != "" && dado != " "){
			return true;
		}
		return false;
	}

	function nom1 (event){
		if (validanome (nome1.val ())){

			nome = nome1.val () + " " + nome2.val ();
			nome1.removeClass ("bg-danger");
		}
		else{
			nome1.addClass ("form-control mr-3 mt-4 bg-danger");
		}
	}

	function nom2 (event){
		if (validanome (nome2.val ())){
			nome = nome1.val () + " " + nome2.val ();
			nome2.removeClass("bg-danger");
		}
		else{
			nome2.addClass ("form-control mr-3 mt-4 bg-danger");
		}
	}	

		// função que valida cpf
function validaCPF(cpf)
  {
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11)
          return false;
    for (i = 0; i < cpf.length - 1; i++)
          if (cpf.charAt(i) != cpf.charAt(i + 1))
                {
                digitos_iguais = 0;
                break;
                }
    if (!digitos_iguais)
          {
          numeros = cpf.substring(0,9);
          digitos = cpf.substring(9);
          soma = 0;
          for (i = 10; i > 1; i--)
                soma += numeros.charAt(10 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(0))
                return false;
          numeros = cpf.substring(0,10);
          soma = 0;
          for (i = 11; i > 1; i--)
                soma += numeros.charAt(11 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(1))
                return false;
          return true;
          }
    else
        return false;
  }



	function validacpf (event){
		if (validaCPF(cpf.val ())){
			cpf.removeClass ("bg-danger");
		}
		else{
			cpf.addClass ("form-control mr-3 mt-4 bg-danger");
		}
	}

	function cepvalido (c){
		var contador = 0, com = 0, t = false;
		console.log (c);
		if (c.lenght === 8){
			return true;
		}
		return false;
	}

	// função que valida cep
	function validacep (event){
		console.log (cepvalido (cep.val ()));
	}

	// evento de submit
	function submeter (){
		alert ("correto");
	}


	// variaveis
	var formulario = $("#cadastro");
	var email = $("#ent1");
	var nome1 = $("#ent2");
	var nome2 = $("#ent3");
	var nome;
	var cpf = $("#ent5");
	var cep =  $("#ent11");


	// escutadores de eventos
	email.keypress (emailacao);	
	nome1.keypress (nom1);
	nome2.keypress (nom2);	
	cpf.keypress (validacpf);
	cep.keydown (validacep);

	// evento de submit
	//formulario.submit (submeter);

}

$(document).ready (principal);
