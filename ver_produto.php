<html>
<head><title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<link rel="shortcut icon" href="img/logo01.png">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<style>

body{
	font-family: arial;
	
}

.title {
	font-size: 20px;
	color: #000000;
}

.sub-title{
	color: #ccc;
}

.zoom {
	overflow: hidden;
}

.zoom img {
	width: 70%;
	-moz-transition: all 0.3s;
	-webkit-transition: all 0.3s;
	transition: all 0.3s;
}

.zoom:hover img {
	-moz-transform: scale(1.1);
	-webkit-transform: scale(1.1);
	transform: scale(1.1);
	text-shadow: 13px;
}

.row {
  display: -webkit-flex;
  display: flex;
}


.column {
   -webkit-flex: 1;
   -ms-flex: 1;
   flex: 1;
   padding: 20px;
   height: 460px;
   border-style: solid;
   border-top-style: hidden;
   border-right-style: solid;
   border-bottom-style: hidden;
   border-left-style: solid;
   border-left-width: 1px;
}

.column-img {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  padding: 20px;
  height: 387px;

}

@media (max-width: 200px) {
  .row {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

.pagamentos-info{
   color: green;
}

.informacoes{
   margin: 10px;
   padding: 10px;
   color: #ccc;
   text-align: justify;
}

.input{
   border-radius: 20px;
	width: 50px;
	height: 20px;
	text-align: center;
	border-color: grey;
	border-style: solid;
 	transition: width 0.8s
}

.input:focus{
   width: 100px;
	border-color: #23b24e;
}

.carrinho{
   margin: auto;
   text-align: center;	
   padding: 10px;
}

</style>
<?php

session_start();

$id = $_GET['id'];

include("libs/valor_formata.php");
include("libs/banco.php");
include("libs/estilos.php");
unset($sql,$q,$linha,$result);
$q="SELECT * FROM Produtos WHERE id='$id'";
$result=mysql_query($q);
$linha=mysql_fetch_array($result);
$id=$linha["id"];
$nome=$linha["nome"];
$desc=$linha["descricao"];
$marca=$linha["marca"];
$valor=$linha["valor"];
$categoria=$linha["categoria"];
$qtdestoque=$linha["qtd_estoque"];
$promocao=$linha["promocao"];
$lancamento=$linha["lancamento"];
$emailVendedor = $linha['email']; 
$foto=$linha["foto"];

$_SESSION['qtdestoque'] = $qtdestoque;
if($lancamento==1){
	$em_lancamento = "<p style='display:inline-block; color: #30c9a8; font-size: 30px;'><b>Lançamento<br></b></p>";
} else {
$em_lancamento="";
}
if($promocao==1){
$em_promocao = "<p style='display:inline-block; color: #30c9a8; font-size: 30px;'><b>Promoção!</b></p>";
} else {
$em_promocao="";
}
?>



<div class="row">
  <div class="column-img">
		<div class="zoom">
			<img class="img-responsive" src="produtos/<?php echo $foto;?>" alt="<?php echo $nome; ?>" border="0" />
		</div>
  </div>

 	<div class="column">
 	<?php echo $em_lancamento; ?><br>
 	<?php echo $em_promocao; ?>
 	<h2><?php echo $nome; ?></h2>
 	<p class="title">Marca:</p><p class="sub-title"><?php echo $marca; ?></p>
 	<p class="title">Quantidade disponível:</p><p class="sub-title"><?php echo $qtdestoque; ?></p>
 	
	<?php FormatarValor($valor); ?> <br>
	
	
	
	<div class="pagamentos-info">
	
	   <p class="parcela"> 
	   <?php 
	   
	   	if ($valor >= 8000){
	   
				echo "12x de ";
					   
			   $valorParcela = $valor/12;
			   
		  	   $valorFormata = explode('.',$valorParcela);
		  	   
		  	  	$valorParcela = $valorFormata[0];
		  	  	
		  	  	FormatarValor($valorParcela);
	  	  	
	  	  	}
	   ?>
		</p>
	   <div class="metodos-pagamento">
	      <label class="sub-title"> Formas de pagamento</label><br>
         <img width="50px" src="img/visa-logo.png">
         <img width="50px" src="img/Mastercard-logo.svg.png"><br><br>
	   </div>
	   
	   <?php

		   if ($emailVendedor == ""){
			   echo "<span class='sub-title'>Fornecido e entregue pelo GAMES ROOM</span>";
		   } else {
			   echo "<span class='sub-title'>vendido por $emailVendedor</span>";	
		   }

	   ?>
	
	</div>
	
	</div>
	
	
</div>






<br><br><br>
<div class="informacoes">
<div class="title">Especificações do produto:</div>
<?php echo $desc; ?>
</div>


<div class=carrinho>

   <form name="adicionar" action="carrinho.php?ver=sim" method="post">
   Quantidade:
   <input type="text" class="input" name="qtd" size="4" value="1" maxlength="4" />

   <input type="hidden" class="campo1" name="id_produto" size="4" value="<?php echo $id; ?>" maxlength="4" />

   <input type="image" src="imgs/adicionar_carrinho.png" alt="Adicionar no carrinho" />
   
</div>

