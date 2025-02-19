<?php
$path = $_SERVER['REDIRECT_URL'];

if ($path == '/'){
	require 'controllers/index_controller.php';

}




//  else if ($path == '/mon_compte'){
// 	require 'controllers/mon_compte_controller.php';
// } else if ($path == '/filtreProduit'){
// 	require 'controllers/filtreProduit_controller.php';
// }



else{
	$path = explode('/',$path)[1];

	$controlleur = 'controllers/' . $path .'_controller.php';

	if (file_exists($controlleur)){
		require $controlleur;
	}else{
		require '404.php';
	}

}
?>