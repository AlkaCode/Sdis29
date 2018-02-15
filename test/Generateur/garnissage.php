<?php

    include '../../lib/php/SQL/connectAD.php';
    
    //les classes sont dans le fichier classe.txt
    $matricule = file("code.txt");
    $nom = file("nom.txt");
    $prenom = file("fille.txt");
    $date = file("date.txt");
    // tant que $i est inferieur au nombre d'éléments du tableau...
    for($i=0; $i < 100; $i++) {
        $sql="INSERT INTO pompier(SP_MATRICULE, GRA_ID, CIS_ID, SP_NOM, SP_PRENOM, SP_DTE_NAISSANCE, SP_TEL_FIXE, SP_TEL_PORTABLE, SP_BIP, SP_STATUT, SP_DTE_MAJ)
              VALUES ($i, 1, 1, '$nom[$i]', '$prenom[$i]', '$date[$i]', '0202020202', '0602020202', 1, 'statut', '2018-02-08')";
        echo "Sql : ".$sql."<br />";
        $result = executeSQL($sql);
    }
?>