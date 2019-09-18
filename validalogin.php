<?php
	session_start();
	include ("libs/banco.php");
	include("libs/estilos.php");
	$email=$_POST['email'];
	$senha=$_POST['senha'];
	unset($sql,$id,$nome);
	$sair = isset($_GET['sair']) ? $_GET['sair'] : null ; //SÓ FUNCIONA COM O GET
	if ($sair=="sim") {
	$_SESSION['id'] = null;
	$_SESSION['nome'] = null;
	$_SESSION['senha'] = null;
	$_SESSION['email'] = null;
?>
<script>
	open('index.php', target='_parent');
</script>
<?php
} else {
	$sql= "SELECT * FROM CLIENTES WHERE EMAIL='$email' AND SENHA='$senha'";
	$result = mysql_query($sql) or die (mysql_error()); //executa o comando sql e guarda na variavel
	$existe = mysql_num_rows($result); //conta a qtd de linhas da variavel result
	if ($existe > 0){ //se existir alguma linha ele entra
	while ($linha = mysql_fetch_array($result)) {
	$id=$linha["ID_CLIENTE"];
	$nome=$linha["NOME"];
	$email2=$linha["EMAIL"];
	$senha2=$linha["SENHA"];
	$nome_divide=explode(" ",$nome);
	$nome=$nome_divide[0];
	$_SESSION['id'] = $id;
	$_SESSION['nome'] = $nome;
	$_SESSION['email'] = $email2;
	$_SESSION['senha'] = $senha2;
?>
<script>
open('index.php', target='_parent');
</script>
<?
$erro=false;
break;
}
}else {
$erro=true;
}
if ($erro==true) {
echo "<br><br><br><br><center><font class='texto1'>E-mail ou Senha Inválida!<br> Tente Novamente!</font>";
echo "<br><br><font class='texto1'>Clique em <a class='link2'href='javascript:history.back(-1)' target='pri'>Voltar</a> para corrigir</font>";
}
}
?>
