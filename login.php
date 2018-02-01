<?php include 'lib/php/head.php'?>
<?php include 'lib/php/menu.php'?>

  <div id="content">
    <div id="left">
    
        <form action="lib/php/SQL/connectLogin.php" method="get">
        
        	<p>
            	<label for="loginName" >Login : </label>
        		<input id="loginName" name="loginName" type="text" value="" size="10" maxlength="8" />
        		
        		<br />
        		
        		<label for="loginMdp" >Mot de Passe : </label>
        		<input id="loginMdp" name="loginMdp" type="password" value="" size="10" maxlength="8" />    
        	</p>
        	
        </form>
    </div>
   <?php include 'lib/php/menu_droit.php'?>
<?php include 'lib/php/footer.php'?>