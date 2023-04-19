<?php  

	# Incluindo os arquivos necessários
	include_once dirname(__DIR__)."/models/config.php";
	include_once $project_path."/models/class/Connect.class.php";
	include_once $project_path."/models/class/Manager.class.php";
	include_once $project_path."/models/class/User.class.php";

	# Recebendo os dados do formulário
	$email = $_POST['email'];
	$password = $_POST['password'];

	# Fazendo a chamada no banco
	$manager = new Manager();

	# Preparando a busca
	$tables['tb_users'] = array();
	$tables['tb_profiles'] = array();  //tipo de usuario admin/funcionario
	$rels['tb_users.profile_id'] = "tb_profiles.id_profile"; //relcionmento
	$filters['tb_users.user_email'] = $email;

	$log = $manager->select_special($tables, $rels, $filters, " LIMIT 1");


	# Testando o Login
	if(!$log){
		header("location: $project_index?error=user_not_found"); //$project_index = "http://".$_SERVER['SERVER_NAME'].$project_name;
	}else{

		# Removendo a senha da sessão
		unset($log[0]['user_password']);

		# Criando o objeto do tipo User
		$user = new User($log[0]['user_name'],$log[0]['user_email']);

		# Setando o restante dos atributos graças ao metódo mágico __set
		foreach ($log[0] as $key => $value){
			$user->$key = $value;
		}

		# Criando a sessão
		session_start();

		$_SESSION[sha1("user_data")] = $user;

		header("location: $project_index"); //volta pro index.php ja que esta na raiz $project_index

	}

?>