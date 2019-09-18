<head><title>Finalizar Compra</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table width="650px" cellpadding="0" cellspacing="0">
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

table{
	margin: 0 auto;
	width: 100%;
}

</style>
<tr style="height:40px">
</tr>
</table>
<?php
include("libs/banco.php");
include("libs/valor_formata.php");
include("libs/estilos.php");
unset($id_usuario,$sql,$linha,$query);
$id_usuario = $_GET['idcli'];
$sql = "SELECT * FROM CLIENTES WHERE ID_CLIENTE = '$id_usuario'";
$query = mysql_query($sql);
while($linha = mysql_fetch_array($query)){
$id = $linha["ID_CLIENTE"];
$nome = $linha["NOME"];
$email = $linha["EMAIL"];
$fone = $linha["FONE"];
$endereco = $linha["ENDERECO"];
$bairro = $linha["BAIRRO"];
$cidade = $linha["CIDADE"];
$estado = $linha["ESTADO"];
$cep = $linha["CEP"];
$cpf = $linha["CPF"];
$rg = $linha["RG"];
}
/********* ACRESCENTA O TRAÇO NO CEP *********/
$cep1=substr($cep,0,5);
$cep2=substr($cep,5,3);
$cep=$cep1."-".$cep2;
/********* ACRESCENTA O TRAÇO NO CEP *********/
/**** ACRESCENTA OS PONTOS E TRAÇO NO CPF ****/
$cpf1=substr($cpf,0,3);
$cpf2=substr($cpf,3,3);
$cpf3=substr($cpf,6,3);
$cpf4=substr($cpf,9,2);
$cpf=$cpf1.".".$cpf2.".".$cpf3."-".$cpf4;
/**** ACRESCENTA OS PONTOS E TRAÇO NO CPF ****/
unset($sql,$query,$linha);
?>
<div class="container">
	<table width="620px" cellpadding="0" cellspacing="1" class="tableerro" border="0" align="center">
	<tr>
		<td width="5%"></td>
		<td align="left">&nbsp;</td>
		</tr>
	<tr>
		<td width="5%"></td>
		<td align="left"><font class="erro1">Atenção!</font></td>
	</tr>
	<tr>
		<td width="5%"></td>
		<td align="left"><font class="textoerro">&rsaquo;&nbsp;Confira todos os dados abaixo antes de finalizar a compra.</font></td>
	</tr>
	<tr>
		<td width="5%"></td>
		<td align="left"><font class="textoerro">&rsaquo;&nbsp;Preencha os campos quanto a forma de pagamento.</font></td>
	</tr>
	<tr>
		<td width="5%"></td>
		<td align="left">&nbsp;</td>
	</tr>
	</table>
	<br>
	<table width="650px" cellpadding="0" cellspacing="3" border="0">
	<tr>
		<td colspan="5"><font class="texto4"><b>Informações do cliente</b></font></td>
	</tr>
	<tr>
		<td><font class="texto3">Nome:</font></td>
		<td colspan="5"><font class="texto6"><?php echo $nome; ?></font></td>
	</tr>
	<tr>
		<td><font class="texto3">E-mail:</font></td>
		<td colspan="5"><font class="texto6"><?php echo $email; ?></font></td>
	</tr>
	<tr>
		<td><font class="texto3">Telefone:</font></td>
		<td colspan="5"><font class="texto6"><?php echo $fone; ?></font></td>
	</tr>
	<tr>
		<td><font class="texto3">Endereço:</font></td>
		<td><font class="texto6"><?php echo $endereco; ?></font></td>
		<td><font class="texto3">Bairro:</font></td>
		<td colspan="3"><font class="texto6"><?php echo $bairro; ?></font></td>
	</tr>
	<tr>
		<td><font class="texto3">Cidade:</font></td>
		<td><font class="texto6"><?php echo $cidade; ?></font></td>
		<td><font class="texto3">Estado:</font></td>
		<td><font class="texto6"><?php echo $estado; ?></font></td>
		<td><font class="texto3">CEP:</font></td>
		<td><font class="texto6"><?php echo $cep; ?></font></td>
	</tr>
	<tr>
		<td><font class="texto3">CPF:</font></td>
		<td><font class="texto6"><?php echo $cpf; ?></font></td>
		<td><font class="texto3">RG:</font></td>
		<td colspan="3"><font class="texto6"><?php echo $rg; ?></font></td>
	</tr>
	<tr>
		<td colspan="6">&nbsp;</td>
	</tr>
	</table>
	<?php
	$data = date("d/m/Y",time());
	?>
	<table width="650px" cellpadding="0" cellspacing="3" border="0">
	<tr>
		<td colspan="6"><font class="texto4"><b>Informações da compra</b></font></td>
	</tr>
	</table>

	Produtos

	<table width="650px" cellpadding="0" cellspacing="3" border="0" id="customers">
	
	<tr bgcolor="#003366">
		<th width="7%"><font class="texto12">Código</font></td>
		<th width="50%"><font class="texto12">Produto</font></td>
		<th align="center"><font class="texto12">Quantidade</font></td>
		<th align="center"><font class="texto12">Valor Unitário</font></td>
		<th align="center"><font class="texto12">Valor Total</font></td>
	</tr>
	<?php
	unset($sql_carrinho,$re,$num_produtos_carrinho);
	$sql_carrinho = "SELECT id_produto,qtd_produto FROM carrinho WHERE
	id_usuario='$id_usuario'";
	$re = mysql_query($sql_carrinho);
	$num_produtos_carrinho = mysql_num_rows($re);
	$total_compra = 0;
	$x = 0;
	unset($sql,$result,$linha);
	while($lc = mysql_fetch_array($re)){
	if (($x % 2)==0) {
	$bgcolor="#FFFFFF";
	}else {
	$bgcolor="#DADADA";
	}
	$id_produto = $lc["id_produto"];
	$qtd = $lc["qtd_produto"];
	$sql="SELECT id,nome,valor FROM Produtos WHERE id = '$id_produto'";
	$result = mysql_query($sql);
	while($linha = mysql_fetch_array($result)){
	$id = $linha["id"];
	$nome = $linha["nome"];
	$valor = $linha["valor"];
	$valortotal = $valor * $qtd;
	$total_compra = $valortotal + $total_compra;
	?>
	<tr bgcolor="<?php echo $bgcolor; ?>">
		<td align="center"><font class="texto10"><?php echo $id_produto; ?></font></td>
		<td><font class="texto10"><?php echo $nome; ?></font></td>
		<td align="center"><font class="texto10"><?php echo $qtd; ?></font></td>
		<td align="center"><font class="texto10"><?php FormatarValor($valor); ?></font></td>
		<td align="center"><font class="texto10"><?php FormatarValor($valortotal); ?></font></td>
	<?php $x ++;
	}
	}
	?>	
	</tr>
	<tr>
	<td colspan=4><b>Total da compra: </b></td>
	<td align="center"><font class="erro1"><b>
	<?php if($num_produtos_carrinho == 0){ 
	echo "R$ 0,00";
	}else{
	FormatarValor($total_compra);
	} 
	?></b></font></td>
	</tr>
	</table>
	
	<br>
	
	<br>
	
	<table width="650px" border="0" cellspacing="3" cellpadding="0">
	</table>
	<br>
	<table width="650px" cellpadding="0" cellspacing="4" border="0">
	<tr>
	<td colspan="6"><font class="texto4"><b>Formas de pagamento</b></font></td>
	</tr>
	<tr>
	<td colspan="6"><form name="formas" action="compra_finalizada.php?idpro=<?echo $id_produto?>&qtd=<?echo $qtd?>&idcli=<?echo $id_usuario?>&total=<?echo $total_compra?>" method="post"></td>
	</tr>
	<tr>
	<td colspan="6"><font class="texto3"><b>Escolha a forma de pagamento:</b></font></td>
	</tr>
	<tr>
	<td width="3%"><input type="radio" name="pagamento" value="1" checked="checked" /></td>
	<td width="30%"><font class="texto3">Via Motoboy</font></td>
	<td width="3%"><input type="radio" name="pagamento" value="2" /></td>
	<td><font class="texto3">Depósito em Conta</font></td>
	</tr>
	<tr>
	<td align="center" colspan="6"><font class="texto3">&nbsp;</font></td>
	</tr>
	<tr>
	<td colspan="6"><font class="vermelho"><b>Obs:</b> Os produtos será
	entregues no endereço informado em seu cadastro. Por favor confira se está correto.</font></td>
	</tr>
	<tr>
	<td align="center" colspan="6"><font class="texto3">&nbsp;</font></td>
	</tr>
	<tr>
	<td align="center" colspan="6"><input type="submit" value="enviar"/></form></td>
	</tr>
	</table>
</div>
</body>
</html>
