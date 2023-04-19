<?php  

	# Incluindo os arquivos necessários
	include_once 'models/config.php';
	//include_once 'models/dictionary.php';
	include_once 'controllers/validate.php';
	include_once 'models/class/User.class.php';

	# Teste de sessão
	session_start();

	if(!isset($_SESSION[sha1("user_data")])){
		header("location: $project_index?error=access_denied");
	}

	# Recuperando os dados da sessão
	$user = $_SESSION[sha1("user_data")];	

	# Titulo da Página
	$page_title = "Admin ".$user->user_name;

	# Função Gerenciadora de conteúdos
	function page_content(){
		validate_options();
	}

	# Incluindo o layout
	include_once 'views/template.html';


?>