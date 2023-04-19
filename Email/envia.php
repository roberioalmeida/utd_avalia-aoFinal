<?php

	$vmail=$_POST['email_txt'];
	$vasun=$_POST['assunto_txt'];
	$vmens=$_POST['msg_txt'];

	if(mail($vmail,$vasun,$vmens,"Replay-To:mm_sistemas@outlook.com")){ //Replay-To outro email para receber as respostas
		echo "Mensagem Enviada,<br/>";                                  //From-To outro email de envio
		echo "<a href=mail.php target=_self>Voltar</a>";
	}else{
		echo "Erro ao Enviar";
	}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<title>TEste de Envio de EMAILS</title>
</head>
<body>
</body>
</html>