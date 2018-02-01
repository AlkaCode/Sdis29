<?php

    if(isset($_GET['loginName']) && isset($_GET['loginPass'])){
        
        $name = $_GET['loginName'];
        $password = $_GET['loginPass'];
        
        $sql = "SELECT * FROM login WHERE LOG_NAME = $name";
        
        $result = compteSQL($sql);
        
        if($result > 0){
            $sql = "SELECT * FROM login WHERE LOG_NAME = $name";
            
            $result = compteSQL($sql);
            if($result > 0){               
                echo "<meta http-equiv='refresh' content='0;url=0141_frmsaisirV4.php?message=<font color=green>Mot de Passe Bon</font>'>";
            }else{
                echo "<meta http-equiv='refresh' content='0;url=0141_frmsaisirV4.php?message=<font color=red>Mauvais Mot de Passe</font>'>";
            }
        }else{
            echo "<meta http-equiv='refresh' content='0;url=0141_frmsaisirV4.php?message=<font color=red>Mauvais Login</font>'>";
        }
        
    }else{
        echo "<meta http-equiv='refresh' content='0;url=0141_frmsaisirV4.php?message=<font color=yellow>Veuillez saisir tous les champs</font>'>";
    }

?>