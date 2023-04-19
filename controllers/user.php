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
//			$_POST['user_password'] = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
			$manager = new Manager();
			$manager->insert_common("tb_users", $_POST, NULL);

			header("location: $project_index/".$user->profile_page."/?op=list_users&success=user_inserted");

		break;

		case "update":
			unset($_POST['action']);
			if($_POST['user_password'] != ""){
				$_POST['user_password'] = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
			}else{
				unset($_POST['user_password']);
			}
			
			$manager = new Manager();
			$manager->update_common("tb_users", $_POST, array("id_user"=>$_POST['id_user']), NULL);
			header("location: $project_index/".$user->profile_page."/?op=list_users&success=user_updated");
		break;		

		case "delete":
			unset($_POST['action']);
			$manager = new Manager();
			$manager->delete_common("tb_users", array("id_user"=>$_POST['filter']), NULL);
			header("location: $project_index/".$user->profile_page."/?op=list_users&success=user_deleted");
		break;

	}	

