<!DOCTYPE html>
<html>
<head>
	<title>Games Room - Sua Loja de Jogos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="img/logo01.png">
   <link rel="stylesheet" href="css/banner.css" type="text/css" />
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>
<body>

<div class="jumbotron">

<h1>Atenção: Todos os campos devem ser Preenchidos</h1><br>

<form method="post" action="validacadastro.php">
							
<span> Nome </span><input type='text' class='form-control' id="nome" onfocus="validaCadastro()" name='nome' size='35'><br>
							   	
<span> E-mail </span><input type='email' class='form-control' id="email" name='email' size='35'><br>
<span> Senha </span><input type='password' class='form-control' id="senha" name='senha' size='8' maxlength='8'><br>
<span> Confirmar Senha </span><input type='password' class='form-control' id="confirmasenha" name='confirmasenha' size='8' maxlength='8'><br>
<span> Endereço </span><input type='text' id="endereco" name='endereco' class='form-control' size='35'><br>
<span> Bairro </span><input type='text' name='bairro' id="bairro" class='form-control' size='35'><br>							   
							   <span> Cidade </span><input type='text' name='cidade' id="cidade" class='form-control' size='35'><br>
							   <span> Estado </span>
                        <select name='estado' class='form-control'>
                        <option value='AC'>AC</option>
                        <option value='AL'>AL</option>
                        <option value='AM'>AM</option>
                        <option value='AP'>AP</option>
                        <option value='BA'>BA</option>
                        <option value='CE'>CE</option>
                        <option value='DF'>DF</option>
                        <option value='ES'>ES</option>
                        <option value='GO'>GO</option>
                        <option value='MA'>MA</option>
                        <option value='MG'>MG</option>
                        <option value='MS'>MS</option>
                        <option value='MT'>MT</option>
                        <option value='PA'>PA</option>
                        <option value='PB'>PB</option>
                        <option value='PE'>PE</option>
                        <option value='PI'>PI</option>
                        <option value='PR'>PR</option>
                        <option value='RJ'>RJ</option>
                        <option value='RN'>RN</option>
                        <option value='RO'>RO</option>
                        <option value='RR'>RR</option>
                        <option selected value='RS'>RS</option>
                        <option value='SC'>SC</option>
                        <option value='SE'>SE</option>
                        <option value='SP'>SP</option>
                        <option value='TO'>TO</option>
                        </select><br>							   
							   <span> CEP </span><input type='text' class='form-control' name='cep' size='15' id="cep"><br>
							   <span> Telefone </span><input type='text' class='form-control' id="fone" onkeypress="$(this).mask('(00) 00000-0000')" name='fone' size='15'><br>						   
							   <span> RG </span><input type='text' name='rg' id="rg" onkeypress="$(this).mask('00.000-000');" class='form-control' size='15'><br>
							   <span> CPF </span><input type='text' name='cpf' id="cpf" onkeypress="$(this).mask('000.000.000-00');" class='form-control' size='15'><br>							   
							   								  <button type='submit' name='Cadastrar' class='btn btn-primary'>Efeturar cadastro</button>	
						</div>

						  </form>
						  <script>
						  /*
						      $('#insert_form').on('submit', function(event){
										event.preventDefault();
										if($('#nome').val() == ""){
											//Alerta de campo nome vazio
											$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário prencher o campo nome!</div>');
										}
										if($('#email').val() == ""){
											//Alerta de campo email vazio
											$("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário prencher o campo e-mail!</div>');						
										}else{
											//Receber os dados do formulário
											var dados = $("#insert_form").serialize();
											$.post("validacadastro.php", dados, function (retorna){
												if(retorna){
													//Alerta de cadastro realizado com sucesso
													$("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
								
													//Limpar os campo
													$('#insert_form')[0].reset();
								
													//Fechar a janela modal cadastrar
													$('#addUsuarioModal').modal('hide');
								
													//Limpar mensagem de erro
													$("#msg-error").html('');	
							
												}else{
								
												}
							
											});
										}
									});
						  */
						  </script>
					 </div>
				  </div>
				</div>
<!-- chamando os scripts do jquery e bootstrap -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</div>
</body>
</html>
