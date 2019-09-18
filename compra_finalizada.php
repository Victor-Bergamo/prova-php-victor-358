<html>
<head><title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<?php
include("libs/banco.php");
include ("libs/estilos.php");
include ("libs/valor_formata.php");
unset($totalcompra);
$forma = $_POST["pagamento"];
$totalcompra = $_GET['total'];
if($forma == "1"){
?>
<div class="jumbotron">
	<h1>Sua compra foi finalizada com sucesso!</h1>
	<h3>Forma de Pagamento: <small><b>Motoboy<b></small></h3>

	<p>Os produtos serão entregues no endereço informado no seu
	cadastro, e o pagamento deverá ser feito no ato da Entrega do Produto</p>

	<p>Valor da compra: <b><?echo FormatarValor($totalcompra)?></b></p>

	<p>Obrigado, por efetuar sua compra em nosso Site</p>
</div>

<?
}
if($forma == "2"){
?>

<div class="jumbotron">
	<h1>Sua compra foi finalizada com sucesso!</h1>
	<h3>Forma de Pagamento: <small><b>Depósito em conta</b></small></h3>

	<p>Sua compra será entregue no endereço informado no seu cadastro, após o Depósito na conta:</p>

	Banco: <b>Itáu</b><br>Agência: <b>013</b><br>Conta:
	<b>10005-15</b>
	<br>
	<p>Valor da compra: <b><?echo FormatarValor($totalcompra)?></b></p>
	<br>
	<p>Obrigado, por efetuar sua compra em nosso Site</p>
</div>
<?
}
?>
<?php
unset($id_usuario,$sql,$id_produto,$qtd);
$id_usuario = $_GET['idcli'];
$sql = "SELECT id_produto,qtd_produto FROM carrinho WHERE id_usuario = '$id_usuario'";
$query = mysql_query($sql);
while($linha = mysql_fetch_array($query)){
$id_produto = $linha["id_produto"];
$qtd = $linha["qtd_produto"];
$sql="INSERT INTO PEDIDOS (ID_PEDIDO,ID_PRODUTO,ID_USUARIO,QTD_PRODUTO,FORMAPAG) VALUES (0,'$id_produto','$id_usuario','$qtd','$forma')";
mysql_query($sql); //executa o camando sql da variavel $sql
}
$sql2 = "DELETE FROM carrinho WHERE id_usuario = '$id_usuario'";
mysql_query($sql2);
?>
</body>
</html>
