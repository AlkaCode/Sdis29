<?php
/**
 *  Bibliotheque de fonctions AccesDonnees.php
 *
 *
 *
 * @author Erwan
 * @copyright Estran
 * @version 1.2.2 Mercredi 24 Janvier 2018
 
 * ajout de la fct erreurSQL()
 
 */


$modeacces = "mysqli";




function connexion($host, $port, $dbname, $user, $password) {
	
	global $modeacces, $connexion;
	
	
	if ($modeacces == "mysql") {
		
		@$link = mysql_connect($host,$user,$password)
		or die("Impossible de se connecter : ".mysql_error());
		
		@$connexion = mysql_select_db($dbname)
		or die("Impossible d'ouvrir la base : ".mysql_error());
		
		return $connexion;
		
	}
	elseif($modeacces == "mysqli") {
		
		$connexion = new mysqli("$host", "$user", "$password", "$dbname", $port);
		
		if ($connexion->connect_error) {
			die('Erreur de connexion (' . $connexion->connect_errno . ') '. $connexion->connect_error);
		}
		
		return $connexion;
		
	}
	
	
}



function deconnexion() {
	
	global $modeacces, $connexion;
	
	
	if ($modeacces == "mysql") {
		
		mysql_close();
		
	}
	elseif($modeacces == "mysqli") {
		
		$connexion->close();
		
	}
}



function executeSQL($sql) {
	
	global $modeacces, $connexion;
	
	if ($modeacces=="mysql") {
		@$result = mysql_query($sql)
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysql_error().
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");
				return $result;
	}
	
	elseif($modeacces=="mysqli") {
		$result = $connexion->query($sql)
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysqli_error_list($connexion)[0]['error'].      //$mysqli->error_list;
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");
				return $result;
	}
}



function erreurSQL() {
	
	global $modeacces, $connexion;
	
	if ($modeacces=="mysql") {
		return mysql_error();
	}
	
	elseif ($modeacces=="mysqli") {
		//$mysqli->error_list;
		return mysqli_error_list($connexion)[0]['error'];
	}
	
}


?>