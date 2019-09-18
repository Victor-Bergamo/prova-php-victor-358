<?php

	session_start();
	include ("libs/banco.php");
	include("libs/estilos.php");
	$email = $_POST['email'];
	
	unset($sql,$id,$nome);

?>

<?php

	$sql= "SELECT * FROM CLIENTES WHERE EMAIL='$email'";
	$result = mysql_query($sql) or die(mysql_error()); //executa o comando sql e guarda na variavel
	$existe = mysql_num_rows($result); //conta a qtd de linhas da variavel result
	
	if ($existe > 0){ //se existir alguma linha ele entra
	while ($linha = mysql_fetch_array($result)) {
	$email2=$linha["EMAIL"];
	$senha=$linha["SENHA"];
	echo "<font face='Courier new' color='black' size=5> Sua senha é: <br><b><small>$senha";
	
?>

<?php
$erro=false;
break;
}
}else {
$erro=true;
}
if ($erro==true) {
echo "<br><br><br><br><center><font class='texto1'>E-mail Inválido!<br> Tente Novamente!</font>";
echo "<br><br><font class='texto1'>Clique em <a class='link2'href='javascript:history.back(-1)' target='pri'>Voltar</a> para corrigir</font>";
}

?>
