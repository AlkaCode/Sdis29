  <div id="nav">
  
    <ul>
    
    <?php 
    $menuSTANDARD=array("ACCUEIL");
    $menuSP=array("PERSONNEL","FORMATION");
    $menuCTA=array("PERSONNEL");
    $menuSF=array("PERSONNEL","CATALOGUE","VALIDATION");
    
    
    foreach($menuSTANDARD as $menu){
    	echo '<li class="nlink"><a href="http://www.free-css.com/">'.$menu.'/a></li>';
    }
    if ($_SESSION['Grade']=='SP'){
    	foreach($menuSP as $menu){
    		echo '<li class="nlink"><a href="http://www.free-css.com/">'.$menu.'/a></li>';
    				}
    	}
    	ElseIf ($_SESSION['Grade']=='CTA'){
    		foreach($menuCTA as $menu){
    			echo '<li class="nlink"><a href="http://www.free-css.com/">'.$menu.'</a></li>';
    		}
    	}
    	ElseIf ($_SESSION['Grade']=='SF'){
    		foreach($menuSF as $menu){
    			echo '<li class="nlink"><a href="http://www.free-css.com/">'.$menu.'</a></li>';
    		}
    	}
   
    ?>
    </ul>
 </div>