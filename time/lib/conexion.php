<?php

	require_once("config.php");
	$con=new conexion($cfg['servidor'],$cfg['usuario'],$cfg['clave'],$cfg['baseDatos']);
	class conexion {
		var $link;
		function __construct($servidor,$usuario,$clave,$basededatos){
			$this->link= mysql_connect($servidor,$usuario,$clave);
					mysql_query("SET NAMES 'utf8'"); //Esta vaina soluciona el lio de los acentos en las paginas
			mysql_select_db($basededatos,$this->link);
		}
		function __destruct(){
			mysql_close($this->link);
		}
	}
	
?>