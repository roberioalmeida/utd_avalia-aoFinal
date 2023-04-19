<?php  

	function validate_msg(){

	}
	
	function validate_options(){

		if(!isset($_GET['op'])){
			return false;
		}

		# Incluindo os arquivos necessários
		include_once $GLOBALS['project_path']."/models/class/Connect.class.php";
		include_once $GLOBALS['project_path']."/models/class/Manager.class.php";
	
		# Globalizando os dados da sessão
		global $user;

		switch($_GET['op']){

			case "add_user":
				
				$manager = new Manager();	

				# Pesquisando os perfis
				$profiles = $manager->select_common("tb_profiles", NULL, NULL, " ORDER BY profile_name");

				# Incluindo o formulário
				include_once $GLOBALS['project_path']."/views/forms/add_user.html";

			break;

			case "list_users":

				$manager = new Manager();

				$tables['tb_users'] = array();
				$tables['tb_profiles'] = array();
				$rel['tb_users.profile_id'] = "tb_profiles.id_profile";

				$table_content = $manager->select_special($tables, $rel, NULL, " ORDER BY user_name");

				$table_titles['user_name'] = "Nome";
				$table_titles['user_email'] = "Email";
				$table_titles['user_phone'] = "Telefone";
				$table_titles['user_cpf'] = "CPF";

				# Ações
				$update = true;
				$delete = true;

				# Caminhos
				$update_destiny = "?op=update_user";
				$delete_destiny = "controllers/user.php";

				# Filtro
				$filter = "id_user";

				# Incluir a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";				

			break;

			case "update_user":

				$manager = new Manager();

				$person = $manager->select_common("tb_users", NULL, array("id_user"=>$_GET['filter']), NULL); 

				include_once $GLOBALS['project_path']."/views/forms/update_user.html";				

			break;

			####### CATEGORIAS ##########
			case "add_category":				
				
				# Incluindo o formulário
				include_once $GLOBALS['project_path']."/views/forms/add_category.html";

			break;

			case "list_categories":

				$manager = new Manager();
				
				$table_content = $manager->select_common("tb_categories", NULL, NULL, " ORDER BY category_name");

				$table_titles['id_category'] = "ID";
				$table_titles['category_name'] = "Nome";
				

				# Ações
				$update = true;
				$delete = true;
				$print = false;

				# Caminhos
				$update_destiny = "?op=update_category";
				$delete_destiny = "controllers/category.php";

				# Filtro
				$filter = "id_category";

				# Incluir a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";

				generate_button("?op=add_category", "Categorias");

			break;

			case "update_category":

				$manager = new Manager();

				$categ = $manager->select_common("tb_categories", NULL, array("id_category"=>$_GET['filter']), NULL); 

				include_once $GLOBALS['project_path']."/views/forms/update_category.html";				

			break;

			####### SUB CATEGORIAS ##########
			case "add_subcategory":				
				
				# Incluindo o formulário
				include_once $GLOBALS['project_path']."/views/forms/add_subcategory.html";

			break;

			case "list_subcategories":
				$manager = new Manager();
				
				$table_content = $manager->select_common("tb_subcategories", NULL, NULL, " ORDER BY subcategory_name");

				$table_titles['id_subcategory'] = "ID";
				$table_titles['subcategory_name'] = "Nome";				
				$table_titles['category_id'] = "IdCtegory";

				# Ações
				$update = true;
				$delete = true;
				$print = false;

				# Caminhos
				$update_destiny = "?op=update_subcategory";
				$delete_destiny = "controllers/subcategory.php";

				# Filtro
				$filter = "id_subcategory";

				# Incluir a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";

				generate_button("?op=add_subcategory", "Sub-Categorias");

			break;

			case "update_sbcategory":

				$manager = new Manager();

				$categ = $manager->select_common("tb_subcategories", NULL, array("id_subcategory"=>$_GET['filter']), NULL); 

				include_once $GLOBALS['project_path']."/views/forms/update_sbcategory.html";				

			break;

			####### PRODUTOS ##########
			case "add_product":				
				
				# Incluindo o formulário
				include_once $GLOBALS['project_path']."/views/forms/add_product.html";

			break;

			case "list_product":
				$manager = new Manager();
				
				$table_content = $manager->select_common("products", NULL, NULL, " ORDER BY product_name");

				$table_titles['id_product'] = "ID";
				$table_titles['product_name'] = "Nome";				
				$table_titles['product_code'] = "GTINI";
				$table_titles['product_price'] = "Preço";
				$table_titles['product_stock'] = "Estoque";
				$table_titles['product_created_in'] = "dt. Criçõ";

				# Ações
				$update = true;
				$delete = true;
				$print = false;

				# Caminhos
				$update_destiny = "?op=update_product";
				$delete_destiny = "controllers/product.php";

				# Filtro
				$filter = "id_product";

				# Incluir a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";

				generate_button("?op=add_product", "Produtos");

			break;

			case "update_product":

				$manager = new Manager();

				$product = $manager->select_common("products", NULL, array("id_product"=>$_GET['filter']), NULL); 

				include_once $GLOBALS['project_path']."/views/forms/update_product.html";				

			break;

			####### TIPO PGTO ##########
			case "add_tipopg":				
				
				# Incluindo o formulário
				include_once $GLOBALS['project_path']."/views/forms/add_tipopg.html";

			break;

			case "list_tipopg":
				$manager = new Manager();
				
				$table_content = $manager->select_common("tb_tipopg", NULL, NULL, " ORDER BY tipopg_name");

				$table_titles['id_tipopg'] = "ID";
				$table_titles['tipopg_codigo'] = "Codigo";				
				$table_titles['tipopg_name'] = "Descriçao";

				# Ações
				$update = true;
				$delete = true;
				$print = false;

				# Caminhos
				$update_destiny = "?op=update_tipopg";
				$delete_destiny = "controllers/tipopg.php";

				# Filtro
				$filter = "id_tipopg";

				# Incluir a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";

				generate_button("?op=add_tipopg", "Tipo de Pgto.");

			break;

			case "update_tipopg":

				$manager = new Manager();

				$tipopg = $manager->select_common("tb_tipopg", NULL, array("id_tipopg"=>$_GET['filter']), NULL); 

				include_once $GLOBALS['project_path']."/views/forms/update_tipopg.html";				

			break;

			####### UNID@DE DE MEDID@S ##########
			case "add_unmd":				
				
				# Incluindo o formulário
				include_once $GLOBALS['project_path']."/views/forms/add_unmd.html";

			break;

			case "list_unmd":
				$manager = new Manager();
				
				$table_content = $manager->select_common("tb_unmd", NULL, NULL, " ORDER BY unmd_name");

				$table_titles['id_unmd'] = "ID";
				$table_titles['unmd_codigo'] = "Codigo";				
				$table_titles['unmd_name'] = "Descriçao";

				# Ações
				$update = true;
				$delete = true;
				$print = false;

				# Caminhos
				$update_destiny = "?op=update_unmd";
				$delete_destiny = "controllers/unmd.php";

				# Filtro
				$filter = "id_unmd";

				# Incluir a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";

				generate_button("?op=add_unmd", "Unid@de de Medid@s.");

			break;

			case "update_unmd":

				$manager = new Manager();

				$unmd = $manager->select_common("tb_unmd", NULL, array("id_unmd"=>$_GET['filter']), NULL); 

				include_once $GLOBALS['project_path']."/views/forms/update_unmd.html";				

			break;

			case "Encerrar":
				include_once $GLOBALS['projeact_path']."/controllers/logout.php";	
			break;

		}

	}

?>