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
			$manager->insert_common("tb_unmd", $_POST, NULL);
			header("location: $project_index".$user->profile_page."/?op=list_unmd&success=unmd_inserted");

		break;

		case "update":
			unset($_POST['action']);
						
			$manager = new Manager();
			$manager->update_common("tb_unmd", $_POST, array("id_tipopg"=>$_POST['id_unmd']), NULL);
			header("location: $project_index".$user->profile_page."/?op=list_unmd&success=unmd_updated");
		break;		

		case "delete":
		
			unset($_POST['action']);
			$manager = new Manager();
			$manager->delete_common("tb_unmd", array("id_unmd"=>$_POST['filter']), NULL);
			header("location: $project_index/".$user->profile_page."/?op=list_unmd&success=unmd_deleted");
		break;

	}	

	var_dump($_POST);
