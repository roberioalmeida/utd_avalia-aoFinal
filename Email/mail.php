<?php


?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<title>TEste de Envio de EMAILS</title>
</head>
<body>
	<form name="email" method="post" action="envia.php">
		<label>e-mail</label><br/>
		<input type="txt" name="email_txt"/><br/>
		<label>Assunto</label><br/>
		<input type="text" name="assunto_txt"><br/>
		<label>Mensgem</label><br/>
		<textarea name="msg_txt" rows="5" cols="50"></textarea><br/><br/>
		<input type="submit" value="enviar"/>
	</form>
</body>
</html>