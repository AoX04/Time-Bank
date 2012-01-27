<?php

	include("log.php");
	if(isset($_GET['user_id'])&& isset($_GET['id_proyecto']) )
	{
		if(entrar($_GET['id_proyecto'], $_GET['user_id'])){echo '1'; exit();}
	}
	echo '0';
?>