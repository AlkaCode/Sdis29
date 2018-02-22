<?php

    if(isset($_GET['loginName']) && isset($_GET['loginMdp'])){
        
        $name = $_GET['loginName'];
        $password = $_GET['loginMdp'];
        
        $sql = "SELECT * FROM login WHERE SP_MATRICULE = $name";
        
        $result = compteSQL($sql);
        
        if($result > 0){
            $sql = "SELECT * FROM login WHERE LOG_MDP = $password";
            
            $result = compteSQL($sql);
            if($result > 0){   
                
                $sql = "SELECT GRA_LIBELLE FROM GRADE, POMPIER, LOGIN WHERE LOGIN.SP_MATRICULE = POMPIER.SP_MATRICULE AND POMPIER.GRA_ID = GRADE.GRA_ID;";
               
                $result=tableSQL($sql);
                
                foreach ($result as $ligne){
                    
                    $_SESSION['Grade'] = $ligne['GRA_LIBELLE'];
                    
                }
               echo "<meta http-equiv='refresh' content='0;url=login.php?message=<font color=green>Mot de Passe Bon</font>'>";
                
            }else{
                echo "<meta http-equiv='refresh' content='0;url=login.php?message=<font color=red>Mauvais Mot de Passe</font>'>";
            }
        }else{
            echo "<meta http-equiv='refresh' content='0;url=login.php?message=<font color=red>Mauvais Login</font>'>";
        }
        
    }else{
        echo "<meta http-equiv='refresh' content='0;url=login.php?message=<font color=yellow>Veuillez saisir tous les champs</font>'>";
    }
    
    
    
?>