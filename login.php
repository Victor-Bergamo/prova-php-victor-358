<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
include("libs/estilos.php");
 ?>
</head>
<body>
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="img/logo01.png">
   <link rel="stylesheet" href="css/banner.css" type="text/css" />
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<br><br><br>

<div class="jumbotron">

	<form action='validalogin.php' target='pri' method='post'>
							
		<span> E-mail </span><input class='form-control' type='text' name='email' size='30'><br>
		<span> Senha </span><input type='password' class='form-control' name='senha' maxlength='8'>
		<br><br>
		<button type='submit' name='entrar' class="btn btn-primary btn-lg btn-block">Entrar</button>
		
	</form>
	<div align="center">
		<a class="link1" href="cadastro.php" target="pri">Cadastre-se gratuitamente</a>
		<a class="link1" href="esqueceusenha.php" target="pri">Esqueci minha Senha</a>
	</div>
	
</div>

</table>
</body>
</html>
