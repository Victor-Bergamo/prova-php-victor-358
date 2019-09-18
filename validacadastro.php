<?php
include "libs/banco.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmasenha = $_POST["confirmasenha"];
$endereco = $_POST["endereco"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$fone = $_POST["fone"];
$rg = $_POST["rg"];
$cpf = $_POST["cpf"];
echo "<font face='arial'>";
$mensagem_erro="<font size='4'><b>Os seguintes erros foram encontrados:</b></font><br><br>";
$erro = 0;
if ($nome == "" || strlen($nome) < 6) {
$mensagem_erro .= "<font color='#FF0000'>* Digite seu nome completo.<br>";
$erro = 1;
}
if (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email)) {
$emailresp="válido";
}else{
$mensagem_erro .= "<font color='#FF0000'>* O E-mail digitado cont&eacute;m caracteres inv&aacute;lidos.<br>";
$erro = 1;
}
if (($senha != $confirmasenha) || ($senha == "" || strlen($senha) < 4)) {
$mensagem_erro .= "<font color='#FF0000'>* A senha não é a mesma nos dois campos ou é menor que 4 caracteres.<br>";
$erro = 1;
}
if ($endereco == "" || strlen($endereco) < 5) {
$mensagem_erro .= "<font color='#FF0000'>* O endere&ccedil;o deve ser preenchido.<br>";
$erro = 1;
}
if ($bairro == "" || strlen($bairro) < 5) {
$mensagem_erro .= "<font color='#FF0000'>* O bairro deve ser preenchido.<br>";
$erro = 1;
}
if ($cidade == "" || strlen($cidade) < 4) {
$mensagem_erro .= "<font color='#FF0000'>* A cidade deve ser preenchida.<br>";
$erro = 1;
}
if ($cep == "" || strlen($cep)<8) {
$mensagem_erro .= "<font color='#FF0000'>* O CEP deve ter pelo menos 8 d&iacute;gitos. <u>Ex.:99700000</u><br>";
$erro = 1;
}
if ($fone == "" || strlen($fone) < 8) {
$mensagem_erro .= "<font color='#FF0000'>* O número do telefone deve preenchido.<br>";
$erro = 1;
}
if ($rg == "" || strlen($rg) < 5) {
$mensagem_erro .= "<font color='#FF0000'>* A identidade está incorreta.<br>";
$erro = 1;
}
//EXECUTA A FUNÇÃO CALCULA CPF
CalculaCPF($cpf);
//EXECUTA A FUNÇÃO CALCULA CPF
// VERIFICA SE O EMAIL JÁ ESTÁ CADASTRADO
if($erro == 0){
$sql = mysql_query("SELECT * FROM CLIENTES WHERE EMAIL = '$email'");
while($res = mysql_fetch_array($sql)){

$existe = $res[0];

}
if( isset($existe)){
$mensagem_erro .= "<font color='#FF0000'>* O e-mail: $email já está cadastrado em nosso Banco de Dados.<br><br>Utilize outro e-mail!<br><br>";
$erro = 1;
}else{
mysql_query("INSERT INTO CLIENTES(ID_CLIENTE,NOME,EMAIL,SENHA,ENDERECO,BAIRRO,CIDADE,ESTADO,CEP,FONE,RG,CPF) VALUES ('0','$nome','$email','$senha','$endereco','$bairro','$cidade','$estado','$cep','$fone','$rg','$cpf')");
print "<b>$nome, seu Cadastro foi Realizado com Sucesso!<br><br>Para continuar, efetue o login e Boas Compras!</b>";
}
}
// VERIFICA SE O EMAIL JÁ ESTÁ CADASTRADO
//MOSTRA OS ERROS NA TELA
if ($erro == 1){
print $mensagem_erro;
print "<font color='black'><br>Clique em <a href='javascript:history.back(-1);'>Voltar</a> para corrigir.";
exit;
}
//MOSTRA OS ERROS NA TELA
//Calcula CPF
function CalculaCPF($cpf){
global $mensagem_erro, $erro;
$RecebeCPF=$cpf;
//Retirar todos os caracteres que nao sejam 0-9
$s="";
for ($x=1; $x<=strlen($RecebeCPF); $x=$x+1){
$ch=substr($RecebeCPF,$x-1,1);
if (ord($ch)>=48 && ord($ch)<=57) {
$s=$s.$ch;
}
}
$RecebeCPF=$s;
if (strlen($RecebeCPF)!=11){
$mensagem_erro .= "<font color='#FF0000'>* &Eacute; obrigat&oacute;rio o CPF com 11 d&iacute;gitos.<br>";
$erro=1;
}
if ($RecebeCPF=="00000000000" || $RecebeCPF=="11111111111" || $RecebeCPF=="22222222222" ||
$RecebeCPF=="33333333333" || $RecebeCPF=="44444444444" || $RecebeCPF=="55555555555" ||
$RecebeCPF=="66666666666" || $RecebeCPF=="77777777777" || $RecebeCPF=="88888888888" ||
$RecebeCPF=="99999999999")
{
$then;
$mensagem_erro .= "<font color='#FF0000'>* CPF inv&aacute;lido.<br>";
$erro=1;
}
else{
$Numero[1]=intval(substr($RecebeCPF,1-1,1));
$Numero[2]=intval(substr($RecebeCPF,2-1,1));
$Numero[3]=intval(substr($RecebeCPF,3-1,1));
$Numero[4]=intval(substr($RecebeCPF,4-1,1));
$Numero[5]=intval(substr($RecebeCPF,5-1,1));
$Numero[6]=intval(substr($RecebeCPF,6-1,1));
$Numero[7]=intval(substr($RecebeCPF,7-1,1));
$Numero[8]=intval(substr($RecebeCPF,8-1,1));
$Numero[9]=intval(substr($RecebeCPF,9-1,1));
$Numero[10]=intval(substr($RecebeCPF,10-1,1));
$Numero[11]=intval(substr($RecebeCPF,11-1,1));
$soma=10*$Numero[1]+9*$Numero[2]+8*$Numero[3]+7*$Numero[4]+6*$Numero[5]+5*$Numero[6]+4*$Numero[7]+3*$Numero[8]+2*$Numero[9];
$soma=$soma-(11*(intval($soma/11)));
if ($soma==0 || $soma==1) {
$resultado1=0;
}
else {
$resultado1=11-$soma;
}
if ($resultado1==$Numero[10]){
$soma=$Numero[1]*11+$Numero[2]*10+$Numero[3]*9+$Numero[4]*8+$Numero[5]*7+$Numero[6]*6+
$Numero[7]*5+
$Numero[8]*4+$Numero[9]*3+$Numero[10]*2;
$soma=$soma-(11*(intval($soma/11)));
if ($soma==0 || $soma==1){
$resultado2=0;
}
else{
$resultado2=11-$soma;
}
if ($resultado2==$Numero[11])
{
$cpf="Válido";
}
else{
$mensagem_erro .= "<font color='#FF0000'>* CPF inv&aacute;lido.<br>";
$erro=1;
}
}
else{
$mensagem_erro .= "<font color='#FF0000'>* CPF inv&aacute;lido.<br>";
$erro=1;
}
}
}
// Fim do Calcula CPF
echo "</font>";
?>
