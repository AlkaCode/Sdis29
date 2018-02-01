<?php
/**
 *  Bibliotheque de fonctions AccesDonnees.php
 *
 *
 *
 * @author Erwan
 * @copyright Estran
 * @version 1.2.5 Mercredi 31 Janvier 2018
 
 * ajout de la fct tableSQL($sql);
 
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
    
    
    if ($modeacces == "mysqli") {
        
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
    
    
    if ($modeacces == "mysqli") {
        
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
    
    if ($modeacces=="mysqli") {
        $result = $connexion->query($sql)
        or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
            mysqli_error_list($connexion)[0]['error'].      //$mysqli->error_list;
            "<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");
            return $result;
    }
}


function executeSQL_GE($sql) {
    
    global $modeacces, $connexion;
    
    
    if ($modeacces=="mysql") {
        $result = mysql_query($sql);
        
    }
    
    if ($modeacces=="mysqli") {
        $result = $connexion->query($sql);
    }
    
    return $result;
}

function erreurSQL() {
    
    global $modeacces, $connexion;
    
    if ($modeacces=="mysql") {
        return mysql_error();
    }
    
    if ($modeacces=="mysqli") {
        //$mysqli->error_list;
        return mysqli_error_list($connexion)[0]['error'];
    }
    
}



function compteSQL($sql) {
    
    global $modeacces, $connexion;
    
    $result = executeSQL($sql);
    
    if ($modeacces=="mysql") {
        $num_rows = mysql_num_rows($result);
    }
    
    if ($modeacces=="mysqli") {
        $num_rows = $connexion->affected_rows;
    }
    
    return $num_rows;
    
}


function tableSQL($sql) {
    
    global $modeacces, $connexion;
    
    $result = executeSQL($sql);
    $rows=array();
    
    if ($modeacces=="mysql") {
        while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
            array_push($rows,$row);
        }
    }
    
    if ($modeacces=="mysqli") {
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            array_push($rows,$row);
        }
    }
    
    return $rows;
    
}


?>