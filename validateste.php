<html>
<head>
<script type="text/javascript">
function id( el ){
	return document.getElementById( el );
}
function no_empty( campo ) {
	if( id( campo ).value=='' ){
		alert( 'O campo '+campo+' deve ser preenchido!' );
		id( campo ).focus();
	}
}
window.onload = function(){

	id('email').onfocus = function(){
		no_empty( 'nome' );
	}
	id('telefone').onfocus = function(){
		no_empty( 'email' );
	}
}
</script>
</head>
<body>
	<form action="" method="post">
		<label>Nome: <input type="text" name="nome" id="nome" /></label>
		<label>Email: <input type="text" name="email" id="email" /></label>
		<label>Telefone: <input type="text" name="telefone" id="telefone" /></label>
		
		
		<label><input type="submit" name="enviar" value="Enviar" /></label>
	</form>
</body>
</html>
