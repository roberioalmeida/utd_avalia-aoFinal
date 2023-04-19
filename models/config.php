<?php  

	# Mostrar os Erros
	ini_set("display_errors", 1);
	error_reporting(E_ALL | E_WARNING | E_PARSE);
	
	# Configuração de Rotas
	$project_name = "/UTC_Project_Final/";

	# Rota 1 - URL GERAL DO PROJETO
	$project_index = "http://".$_SERVER['SERVER_NAME'].$project_name;

	# Rota 2 - CAMINHO GERAL DO PROJETO
	$project_path = $_SERVER['DOCUMENT_ROOT'].$project_name; //"C:/xampp/HTDOCS/UTC_Project_Final/"

	# GLOBALIZANDO
	$GLOBALS['project_index'] = $project_index;
	$GLOBALS['project_path'] = $project_path;


	# Função Geradora de Links de Adição
	function generate_button($link, $text){
		echo "<hr>";
		echo '<a class="btn btn-primary" href="'.$link.'">';
		echo '<i class="fa fa-plus-square"></i> ';
		echo "Adicionar {$text}";
		echo '</a>';
	}


?>