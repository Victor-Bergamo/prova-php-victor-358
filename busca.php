<?php
include("libs/banco.php");
include("libs/valor_formata.php");
include("libs/estilos.php");
$busca=$_POST['buscar'];
$busca2 = strtr($busca, '%!@#$&*=+_.:/?;|\\\'\"', '');
$busca= mysql_escape_string($busca2);

?>
<html>
<head><title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<center>
<table width="650px" cellpadding="0" cellspacing="0">
<tr height="50px">
<td colspan="2"><img src="imgs/busca.png" border="0" alt="Busca" /></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</table>
<?php
	if(!$busca){
?>
<table width="650px" cellpadding="0" cellspacing="0">
<tr>
<td align="center"><font class="texto9">Digite uma palavra-chave para busca!</font></td>
</tr>
</table>
<br>
<table width="500px" cellpadding="5" cellspacing="10" class="tablebusca">
<tr>
<form action="busca.php" method="POST">
<td><font class="texto9">Buscar: </font></td>
<td><input class="campo1" type="text" size="40" maxlength="100" name="buscar" onMouseOver="this.style.border='2px solid #FF6600'" onMouseOut="this.style.border='1px solid #6F7176'" /></td>
<td><input type="submit" value="Buscar" class="campo1"></td>
</tr>
</table>
<br><br><br>
<?php
}else {
$result = mysql_query("SELECT * FROM Produtos WHERE nome LIKE '%$busca%' OR descricao LIKE '%$busca%'");
$num = mysql_num_rows($result);
if($num == 0){
?>

<div class="jumbotron">

	<h1>Nenhum resultado encontrado com a palava-chave:</h1><small style="font-size: 30px;"><?php echo $busca; ?></small>

	<p>Verifique possíveis erros de grafia;</p>

	<p>Exclua palavras muito comuns como: o, as, de, com, etc...</p>
	
	<form action="busca.php" method="POST">
	Buscar:

	<input class="campo1" type="text" size="40" maxlength="100" name="buscar"/></td>
	<input type="submit" value="Buscar" class="campo1">

</div>
<?php
}else{
?>
<table width="650px" cellpadding="0" cellspacing="0" border="0">
<tr>
<td><font class="textoerro">Sua busca retornou <?php echo $num; ?> produtos</font></td>
</tr>
<tr>
<td><hr color="4000FF"></td>
</tr>
</table>
<table width="650px" cellpadding="0" cellspacing="0" border="0">
<?php
while($linha=mysql_fetch_array($result)){
$id = $linha["id"];
$nome = $linha["nome"];
$marca = $linha["marca"];
$valor = $linha["valor"];
$foto = $linha["foto"];
$categoria = $linha["categoria"];
$promocao = $linha["promocao"];
$lancamento =$linha["lancamento"];
if($lancamento==1){
$esta="<p style='color: green; font-size: 20px'>Lançamento!</p>";
}
else{
$esta="";
}
if($promocao==1){
$promo="<p style='color: green;'>Promoção!</p>";
}
else{
$promo="";
}


?>
<!-- ***************INÍCIO DA TABELA DOS PRODUTOS -->
<tr class="trprodutos" onClick="window.location.href='ver_produto.php?id=<?php echo $id; ?>'" bgColor="#FFFFFF">
<td align="center" width="100"><img src="produtos/<?php echo $foto; ?>" border="0" width="80" height="80" /></td>
<td width="280"><font class="texto9"><?php echo "$nome <br><br>";?></font> <div style="color: green; font-size: 19px;"><?php echo FormatarValor($valor); ?></div></td>
<td align="center" width="115"><?php echo $esta ?><?php echo $promo ?></td>
</tr>
<tr>
<td><font class="texto3">&nbsp;</font></td>
</tr>
<tr>
<td colspan="6"><hr color='4000FF'></td>
</tr>
<!-- ***************FIM DA TABELA DOS PRODUTOS -->
<?php
}
}
}
?>
</table>
</center>
