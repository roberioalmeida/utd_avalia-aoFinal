<?php

	
	class Connect {
		
		# Atributo estático da instancia
		public static $instance;

		# Construtor Vazio
		public function __construct(){

		}

		# Método de Conexão com o Banco
		public static function get_instance(){
			if(!isset(self::$instance)){                        // db_utdshop id10305061_sistrest
				self::$instance = new PDO('mysql:host=localhost;dbname=db_utdshop;', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}

			return self::$instance;
		}
	}
?>