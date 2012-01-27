<?php
	include("lib/engine.php");
	$tablas = mysql_query("show tables");
	while($fila = mysql_fetch_array($tablas))
	{
		$tabla = $fila[0];
		$contenido = "<?php
class $tabla
{
";
		
		$campos = array();
		$trs = mysql_query("select * from $tabla limit 1");
		$nColumns = mysql_num_fields($trs);
		
		//para los sqls
		$updateCommand = array();
		$insertCampos = array();
		$insertValores = array();
		$conjuntoCampos = array();
		
		$loadData = array();
		
		$camposDelFormulario = array();
		
		for($i=0; $i < $nColumns; $i++)
		{
			$campo = mysql_field_name($trs, $i);
			$tipo = mysql_field_type($trs, $i);
			
			$campos[] = $campo;
			$contenido .= "	private \${$campo}; //$tipo \n";
			if($i > 0)
			{
				$updateCommand[] = "$campo='\$this->$campo'";
				$insertCampos[] = $campo;
				$insertValores[] = "'\$this->$campo'";
				$loadData[] = "			\$this->$campo = \$row['$campo']; ";
				$conjuntoCampos[] = "\$('.$campo').alphanumeric();";
			}
			
			$camposDelFormulario[] = "
			<tr>
				<td>
					$campo
				</td>
				<td>
					<input type='text' name='campos[$campo]' id='txt$campo' />
				</td>
			</tr>
			";
		}
	
		$campoPrimario = $campos[0];
		
		$updateCommand = implode($updateCommand, ", ");
		$insertCampos = implode($insertCampos, ", ");
		$insertValores = implode($insertValores, ", ");
		
		$loadData = implode($loadData, " \n");

		$camposDelFormulario = implode($camposDelFormulario, "");
		$conjuntoCampos = implode($conjuntoCampos, " \n");
		$contenido .= "
		function __construct(\$cod = 0)
		{
			\$this->$campoPrimario = \$cod;
			//Constructor de la tabla $tabla
		}
		
		function salvar()
		{
			if(\$this->$campoPrimario > 0)
			{
				\$sql = \"update $tabla set $updateCommand where $campoPrimario = \$this->$campoPrimario \"; 
				mysql_query(\$sql);
			}
			else
			{
				\$sql = \"insert into $tabla ($insertCampos) values ($insertValores)\";
				mysql_query(\$sql);
				\$this->$campoPrimario = mysql_insert_id();
			}
		}
		
		function cargar()
		{
			\$sql = \"select * from $tabla where \$campoPrimario = \$this->$campoPrimario\";
			\$rs = mysql_query(\$sql);
			if(mysql_num_rows(\$rs) > 0) //si hay resultados
			{
			\$row = mysql_fetch_array(\$rs);
$loadData
			}
		}
}		
";
		
		$archivo = fopen("clases/cls_$tabla.php","w");
		
		fwrite($archivo, $contenido);
		
		fclose($archivo);
/////////////////////////////////////////////////////////////////
//Para el formulario
////////////////////////////////////////////////////////
		$contenido = "
<html>
	<head>
		<title>Formulario de $tabla</title>
		<script type='text/javascript' src='../js/jquery.js'></script>
		<script type='text/javascript' src='../js/jquery.alphanumeric.pack.js'></script>
	</head>
	<body>
	<center>
	<form method='post' action=''>
		<table>
			$camposDelFormulario
			<tr>
				<td colspan='2'>
					<button type='submit'>Guardar</button>
				</td>
			</tr>
		</table>
		
	</form>
	</center>
	<script type='text/javascript'>
			
		$conjuntoCampos		
		
	</script>
	</body>
</html>
";
		
		$archivo = fopen("formularios/frm_{$tabla}.php","w");
		fwrite($archivo, $contenido);
		fclose($archivo);
		
		
	
	}

?>