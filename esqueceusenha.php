<html>
<head>
<title>Esqueci minha senha</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
	include("libs/estilos.php");
?>
</head>
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="img/logo01.png">
   <link rel="stylesheet" href="css/banner.css" type="text/css" />
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<div class="jumbotron">

	<h1>Recuperar Senha</h1>
	<form action="validasenha.php" target="pri" method="post">

	<span> E-mail </span>

	<input type="text" class='form-control' name="email" size="30"><br>

	<input type="submit" name="entrar" value="Recuperar" class="btn btn-primary btn-lg btn-block">

	</form>

	<div align="center"><a class="link1" href="cadastro.php" target="pri">Cadastre-se gratuitamente</a></div>
</div>
</body>
</html>
