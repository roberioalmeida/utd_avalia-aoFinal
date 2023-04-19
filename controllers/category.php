<?php  
	
	# Incluindo os arquivos necessários
	include_once dirname(__DIR__)."/models/config.php";
	include_once $project_path."/models/class/Connect.class.php";
	include_once $project_path."/models/class/Manager.class.php";
	include_once $project_path."/models/class/User.class.php";

	# Recuperando os dados da sessão
	ob_start();
	session_start();

	if(!isset($_SESSION[sha1("user_data")]) or !isset($_POST['action'])){
		header("location: {$project_index}/?error=access_denied");
	}

	$user = $_SESSION[sha1("user_data")];

	switch($_POST['action']){

		case "insert":

			unset($_POST['action']);			
			$manager = new Manager();
			$manager->insert_common("tb_categories", $_POST, NULL);

			header("location: $project_index/".$user->profile_page."/?op=list_categories&success=category_inserted");

		break;

		case "update":
			unset($_POST['action']);
						
			$manager = new Manager();
			$manager->update_common("tb_categories", $_POST, array("id_category"=>$_POST['id_category']), NULL);
			header("location: $project_index/".$user->profile_page."/?op=list_categories&success=category_updated");
		break;		

		case "delete":
		
			unset($_POST['action']);
			$manager = new Manager();
			$manager->delete_common("tb_categories", array("id_category"=>$_POST['filter']), NULL);
			header("location: $project_index/".$user->profile_page."/?op=list_categories&success=category_deleted");
		break;

	}	

	var_dump($_POST);
