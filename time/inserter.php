<?php
include "lib/engine.php";
if($_POST){

$tabla = $_POST['tabla'];
$campos = $_POST['campos'];
$nombreCampos = array_keys($campos);
$sql= "insert into $tabla (".implode(',',$nombreCampos).") values ('".implode("','",$campos)."')";
//ECHO $sql;
//exit();
$result = mysql_query($sql);

$id=mysql_insert_id();
//echo $id;
$fieldname='foto';

if( $_FILES[$fieldname]['error'] == 0&&
is_uploaded_file($_FILES[$fieldname]['tmp_name'])&&
getimagesize($_FILES[$fieldname]['tmp_name']) ) {
move_uploaded_file($_FILES[$fieldname]['tmp_name'],'fotosProyecto/'. $id) ;
//echo 'movido';
}





if(isset($_POST['retorno'])&&$_POST['retorno']=='true'){
header('location: '.$_SERVER['HTTP_REFERER']);
}
}
