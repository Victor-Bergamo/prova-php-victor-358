<?php

	session_start(); //inicia a sessão
	include("libs/estilos.php");

?>
<html>
<head><title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body onload="document.all.email.focus();">
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="img/logo01.png">
   <link rel="stylesheet" href="css/banner.css" type="text/css" />
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

div.container {
	background-color: #f0f2f0;
	padding: 20px;
	margin: 0 auto;
}
table{
	margin: 0 auto;
	width: 100%;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

</style>
<?php
if (isset($_SESSION['id']) && isset($_SESSION['senha'])){ //se existir a id e senha do usuário entra
	include("libs/valor_formata.php"); 
	include("libs/banco.php"); 
	$ver_produto = isset($_GET['ver']) ? $_GET['ver'] : null ;
	$logado="sim";
	$id=$_SESSION['id'];
	

if ($ver_produto=="sim"){
/*******adicionar no carrinho**************/
$qtd= $_POST['qtd'];
$id_produto= $_POST['id_produto'];
unset($sql);
$sql="INSERT INTO carrinho (id,id_produto,id_usuario,qtd_produto) VALUES(0,'$id_produto','$id','$qtd')";
mysql_query($sql); //executa o comando sql da variavel $sql
/*****adicionar no carrinho******************/
}
$sql_carrinho="SELECT id_produto,qtd_produto FROM carrinho WHERE id_usuario = '$id'";
$re = mysql_query($sql_carrinho);
$num_produtos_carrinho = mysql_num_rows($re);
?>

<div class=container> Você possui <?php echo $num_produtos_carrinho; ?> produto(s) em seu carrinho

<br><br><br>	
<table id="customers" border="0" cellspacing="0" cellpadding="3">
	<tr bgcolor="#006e00">
		<th align="center" width=15%>Código</td>
		<th align="center" width=50%>Produto</td>
		<th align="center" width=50%>Quantidade</td>
		<th align="center" width=50%>Valor Unitário</td>
		<th align="center" width=50%>Valor Total</td>
		<th>&nbsp;</font></td>
	</tr>
<?php
$total_compra = 0;
$x = 0;
while($lc = mysql_fetch_array($re)){
if (($x % 2)==0) { $bgcolor="#FFFFFF"; }
else { $bgcolor="#DADADA";}
$id_produto = $lc["id_produto"];
$qtd= $lc["qtd_produto"];
unset($sql,$result,$linha);
$sql="SELECT id,nome,valor FROM Produtos WHERE id = '$id_produto'";
$result = mysql_query($sql);
while($linha = mysql_fetch_array($result)){
$nome = $linha["nome"];
$valor = $linha["valor"];
$valortotal = $valor * $qtd;
$total_compra = $valortotal + $total_compra;
?>
<tr bgcolor="<?php echo $bgcolor; ?>">
	<td class="tdcarrinho" align="center"><font class="texto10"><?php echo  $id_produto; ?></font></td>
	<td class="tdcarrinho"><font class="texto10"><?php echo $nome; ?></font></td>
	<td align="center" class="tdcarrinho"><font class="texto10"><?php echo $qtd; ?></font></td>
	<td align="center" class="tdcarrinho"><font class="texto10"><?php FormatarValor($valor); ?></font></td>
	<td align="center"><font class="texto10"><?php FormatarValor($valortotal); ?></font></td>
	<td align="center"><a href="remover_do_carrinho.php?idpro=<?echo $id_produto;?>&idusu=<?echo $id;?>">
	<i class="fas fa-trash-alt"></i></a></td>
</div>
<?php $x++;
}
}
}else{
?>
<div class="container">
	<h1> Você precisa efetuar o Login! </h1>
	<form name="login" action="validalogin.php" method="post">
	  <div class="form-group">
		 <label for="exampleInputEmail1">Coloque seu E-mail</label>
		 <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu e-mail...">		 
	  </div>
	  <div class="form-group">
		 <label for="exampleInputPassword1">Coloque sua Senha</label>
		 <input type="password" maxlength="8" type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
	  </div>
	  <button type="submit" class="btn btn-primary">Enviar</button>
	</form>
		Se você não possui cadastro, <a href="cadastro.php" target='pri'>clique aqui</a> e cadastre-se gratuitamente.
</div>
<?
}
?>
</tr>
</table>

<?php 
if (isset($_SESSION['id']) && isset($_SESSION['senha'])){ 
if($num_produtos_carrinho == 0){
echo "";
}else{ 
?>
<br>
<table width="650px" border="0" cellspacing="5" cellpadding="0">
<tr>
<td colspan="2"><hr></td>
</tr>
<tr>
<td width="86%"><font class="texto4"><b>Total da compra: </b></font></td>
<td align="center"><font class="erro1"><b><?php if($num_produtos_carrinho ==0){ echo "R$ 0,00";}else{FormatarValor($total_compra);} ?></b></font></td>
</tr>
</table>
<br>
<br>
<table width="650px" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center">
<a href="finalizarcompra.php?idcli=<?echo $id?>">
<img src="imgs/bfinalizarcompra.png" alt="Finalizar compra" title="Finalizar compra"
border="0" /></a></td>
</tr>
</table>
<?php
}
}
?>
</body>
</html>
