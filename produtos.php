<html>
<head><title>Produtos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>
<style>
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 35%;
}

div.desc {
  padding: 15px;
  text-align: center;
  font-family: "Arial";
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 10 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<br>
<?php

session_start();

$cat = $_GET['cat'];

include("libs/valor_formata.php");
include("libs/banco.php");
require("libs/estilos.php");


$promo = isset($_GET['promo']) ? $_GET['promo'] : null ;

$lanca = isset($_GET['lanca']) ? $_GET['lanca'] : null ;

$c = isset($_GET['c']) ? $_GET['c'] : null; 

unset($sql,$q,$linha,$result);
if($cat > 0){
$q = "SELECT * FROM Produtos WHERE categoria='$cat'";
$result=mysql_query($q);
$qtd_produtos=mysql_num_rows($result);
if($qtd_produtos!=0){
$imprime_qtd_produtos="<p><font class=\"texto6\">".$qtd_produtos." produto(s) nesta categoria</font></p>";
$promocoes="nao";
}
else{
$imprime_qtd_produtos="";
}
}
if ($lanca=="sim"){
unset($sql,$q,$linha,$result);
$q="SELECT * FROM Produtos WHERE lancamento=1";
$result=mysql_query($q);
$qtd_produtos=mysql_num_rows($result);
if($qtd_produtos!=0){
$imprime_qtd_produtos="<font class=\"texto6\">".$qtd_produtos." produto(s) em lançamento</font>";
}
}
if ($promo=="sim"){
unset($sql,$q,$linha,$result);
$q="SELECT * FROM Produtos WHERE promocao=1";
$result=mysql_query($q);
$qtd_produtos=mysql_num_rows($result);
if($qtd_produtos!=0){
$imprime_qtd_produtos="<font class=\"texto6\">".$qtd_produtos." produto(s) em promoção</font>";
}
}
?>

<?php echo "<div> $imprime_qtd_produtos </div>"; ?>
<?php
while($linha=mysql_fetch_array($result)){
$id=$linha["id"];
$nome=$linha["nome"];
$marca=$linha["marca"];
$valor=$linha["valor"];
$foto=$linha["foto"];
$categoria=$linha["categoria"];
$promocao=$linha["promocao"];
$lancamento=$linha["lancamento"];
if($lancamento==1){
   
   $lanc="<span style='color:#09ab67;'><b>Lançamento!</b></span>";

} else {

   $lanc="";
   
} 

if($promocao==1){

   $promo="<span style='color:#09ab67;'><b>Promoção!</b></span>";

} else {

   $promo="";

}
?>
<div class="responsive">
	<div class="gallery" onClick="window.location.href='ver_produto.php?id=<?php echo $id;?>'">
	   <div class="desc">
	      &nbsp;<?php echo $lanc ?>
		</div>
		<img src="produtos/<?php echo $foto; ?>" border="0" width="600" height="400">
			<div class="desc">
				<?php echo "$nome <br>";?>
				<span style="color:green;"><?php echo FormatarValor($valor); ?><span>

				<?php echo $promo ?>
			</div>
	</div>
</div>

<?php
}
?>

<?php
?>

