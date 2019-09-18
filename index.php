<?php
session_start();

$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : null ;
$senha = isset($_SESSION['senha']) ? $_SESSION['senha'] : null ;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null ;
$vendedor = isset($_SESSION['vendedor']) ? $_SESSION['vendedor'] : null ;
$email_vendedor = isset($_SESSION['email_vendedor']) ? $_SESSION['email_vendedor'] : null;


include ("libs/banco.php");


?>
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
<body topmargin="0" bottommargin="0">

</script> 



<!--CABECALHO-->

<?php
if ((isset($_SESSION['id'])) && (isset($_SESSION['senha']))){ //se existir a id e a senha do usuário entra
$continuar = true;
}else{
$continuar = false;
}
if ($continuar==true) {


$query = "SELECT * FROM VENDEDOR WHERE EMAIL='$email'";
$resultado = mysql_query($query) or die(mysql_error()); 
$exist = mysql_num_rows($resultado);

if ($exist > 0 && (isset($_SESSION['email_vendedor']))){
	header('Location:vendedor/index.php');
} 

?> <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
 		<a class='navbar-brand' href='home.php'><img src='img/logo02.png' width='150px'></a>
    
    <form class='form-inline my-2 my-lg-0' action='busca.php' method='post' target='pri'>

      <input class='form-control mr-sm-2' type='text' placeholder='Digite aqui o que você procura, temos de tudo :D' name='buscar' style="width:666px;">
      <button class='btn btn-outline-success my-2 my-sm-0' name='ok' type='submit'> <i class='fas fa-search' style='margin-top: 5px; height: 20px;'></i></button>
    </form>
				<span><img src='img/appEscrita.png' width='330px'></span>
  </div>

</nav>

<!-- Segundo Menu -->

<nav class='navbar navbar-expand-lg navbar-light bg-light'>

	<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
      <li class='nav-item active'>
        	<a class="btn btn-light" target='pri' href='home.php'><i class='fas fa-home'>&nbsp;</i>Home</a><span class='sr-only'>(current)</span></a>
      </li>
      
      <div class='dropdown'>
				<button class="btn btn-light dropdown-toggle" type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					Categorias
				</button>
				<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
					<a class='dropdown-item' href='produtos.php?cat=1' target='pri'>Mouses</a>
					<a class='dropdown-item' href='produtos.php?cat=2' target='pri'>Monitores</a>
					<a class='dropdown-item' href='produtos.php?cat=3' target='pri'>Memória Ram</a>
					<a class='dropdown-item' href='produtos.php?cat=4' target='pri'>Gabinete</a>
					<a class='dropdown-item' href='produtos.php?cat=5' target='pri'>Placas de Som</a>
					<a class='dropdown-item' href='produtos.php?cat=6' target='pri'>Placas de Vídeo</a>
					<a class='dropdown-item' href='produtos.php?cat=7' target='pri'>Placas Mãe</a>
					<a class='dropdown-item' href='produtos.php?cat=8' target='pri'>Teclados</a>
					<a class='dropdown-item' href='produtos.php?cat=9' target='pri'>Hd's</a>
				</div>
			</div>
      
      
      <li class='nav-item active'>
        <a class="btn btn-light" target='pri' href='carrinho.php'><i class='fas fa-shopping-cart'>&nbsp;</i>Carrinho</a> <span class='sr-only'>(current)</span></a>
      </li>
   </ul>
      	<button class='btn' data-toggle='modal' data-target='#ExemploModalCentralizado'>
			  Gerenciar Conta
			</button>
				<div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
				  <div class='modal-dialog modal-dialog-centered' role='document'>
					 <div class='modal-content'>
						<div class='modal-header'>
						  <h5 class='modal-title' id='TituloModalCentralizado'>Gerenciar conta</h5>
						  <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
							 <span aria-hidden='true'>&times;</span>
						  </button>
						</div>
						<div class='modal-body'>
							      
								Nome: <? echo "$nome";?><br>
								Email: <? echo "$email";?><br>
								<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
								<?
								if($exist > 0){ 
								   echo "<a href='vendedor/validasair.php'>Modo vendedor</a>";
								} else {
								   echo " <a href='vendedor/vendedor.php'>Deseja se tornar um vendedor?</a> ";
					         }
					         ?>
			
						</div>
						<div class='modal-footer'>
						  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
						  <button type='submit' class='btn btn-primary'>Salvar mudanças</button>
						</div>
					 </div>
				  </div>
				</div>

   
   <a class='nav-link disabled' href='#' tabindex='-1' aria-disabled='true'>Seja Muito Bem Vindo(a)<?php echo "$nome"; ?> </a>
   <form action='validalogin.php?sair=sim' target='pri' method='POST'>
   <button class='btn btn-light' type='submit' name='Sair'><i class='fa fa-minus-square-o'></i> Sair</button>
</nav>
</form>
<?
} else {
?> <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
 		<a class='navbar-brand' href='home.php'><img src='img/logo02.png' width='150px'></a>
    
    <form class='form-inline my-2 my-lg-0' action='busca.php' method='post' target='pri'>

      <input class='form-control mr-sm-2' type='text' placeholder='Digite aqui o que você procura, temos de tudo :D' name='buscar' style='width: 600px;'>
      <button class='btn btn-outline-success my-2 my-sm-0' name='ok' type='submit'> <i class='fas fa-search' style='margin-top: 5px; height: 20px;'></i></button>
    </form>
				<span><img src='img/appEscrita.png' width='330px'></span>
  </div>

</nav>

<!-- Segundo Menu -->

<nav class='navbar navbar-expand-lg navbar-light bg-light'>

	<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
      <li class='nav-item active'>
        	<a class="btn btn-light" style="text-decoration: none; color: black;" target='pri' href='home.php'><i class='fas fa-home'>&nbsp;</i>Home</a><span class='sr-only'>(current)</span></a>
      </li>
                  &nbsp;&nbsp;&nbsp;
      <div class='dropdown'>
				<button class="btn btn-light dropdown-toggle" type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					Categorias
				</button>
				<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
					<a class='dropdown-item' href='produtos.php?cat=1' target='pri'>Mouses</a>
					<a class='dropdown-item' href='produtos.php?cat=2' target='pri'>Monitores</a>
					<a class='dropdown-item' href='produtos.php?cat=3' target='pri'>Memória Ram</a>
					<a class='dropdown-item' href='produtos.php?cat=4' target='pri'>Gabinete</a>
					<a class='dropdown-item' href='produtos.php?cat=5' target='pri'>Placas de Som</a>
					<a class='dropdown-item' href='produtos.php?cat=6' target='pri'>Placas de Vídeo</a>
					<a class='dropdown-item' href='produtos.php?cat=7' target='pri'>Placas Mãe</a>
					<a class='dropdown-item' href='produtos.php?cat=8' target='pri'>Teclados</a>
					<a class='dropdown-item' href='produtos.php?cat=9' target='pri'>Hd's</a>
				</div>
			</div>
            &nbsp;&nbsp;&nbsp;
      <li class='nav-item active'>
     		<a class="btn btn-light" style="text-decoration: none; color: black;" target='pri' href='cadastro.php'><i class="fas fa-user-plus">&nbsp;</i>Cadastro</a><span class='sr-only'>(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;
   
   </ul>

     		<a class="btn btn-light" style="text-decoration: none; color: black;" target='pri' href='login.php'><i class="fas fa-user-alt"></i> Entre</a>


</nav>
<?
}
?>


    

<iframe name="pri" width="100%" height="700" frameborder="0" src="home.php"></iframe></td>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2014-2019 Copyright:
    <a href="#"> Gamesroom.com.br</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<!-- chamando os scripts do jquery e bootstrap -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>
</html>
