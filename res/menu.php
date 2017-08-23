<?php

$menu = array(
	array( 'titlulo' => "Check-Out", 'class' => "btn btn-default", 'onclick' => "showCheckout();",  'icon' => "fa fa-level-up" ),
	array( 'titlulo' => "Relatórios", 'class' => "btn btn-inverse", 'onclick' => "showMenu(this,'menu1');",  'icon' => "fa fa-list-alt icon-white" ),
);

$submenu['menu1'][] = array('href' => CAMINHO_SIS."relatorios/quantitativo.php", 'titlulo' => "Quantitativo");
$submenu['menu1'][] = array('href' => CAMINHO_SIS."relatorios/todo_mundo.php", 'titlulo' => "Todos os Cadastros");
//$submenu['menu1'][] = array('class' =>'divider' );


function criaLink($itemMenu){
	global $_SESSION,$appname;

	$print = false;
	if(!$itemMenu['permissao']){
		$print = true;
	}else if(is_array($itemMenu['permissao'])){
		foreach($itemMenu['permissao'] as $perm_temp){
			if($_SESSION[$appname]["PERM"][$perm_temp]){$print = true;}
		}
	}else{
		if($_SESSION[$itemMenu[$appname]["PERM"]['permissao']]){$print = true;}
	}

    if($itemMenu['sem_permissao']){
        if(is_array($itemMenu['sem_permissao'])){
            foreach($itemMenu['sem_permissao'] as $perm_temp){
                if($_SESSION[$appname]["PERM"][$perm_temp]){$print = false;}
            }
        }else{
            if($_SESSION[$appname]["PERM"][$itemMenu['sem_permissao']]){$print = false;}
        }
    }

	if( $print ){
		if($itemMenu['class']){   $inside .= "class='".$itemMenu['class']."'"; }
		if($itemMenu['onclick']){ $inside .= "onclick=\"".$itemMenu['onclick']."\""; }
		if($itemMenu['href']){    $inside .= "href='".$itemMenu['href']."'"; }
		if($itemMenu['icon']){ 	  $icon   .= "<i class='".$itemMenu['icon']."' style='margin-right:5px;'></i> "; }

		return "<a $inside >$icon ".$itemMenu['titlulo']."</a>";
	}else{
		return 0;
	}
}


?>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="<?php echo CAMINHO_SIS;?>">
				<img src="<?php echo $caminho;?>imagens/up.png" style='width:30px'>
				<?php echo $appname;?></a>
			<ul class="nav">

				<?php
				    foreach($menu as $itemMenu){

				    	$link_base = criaLink($itemMenu);
				    	if($link_base){
				    	?>
							<li>
								<div class="btn-group">
									<?php echo $link_base; ?>
								</div>
							</li>
						<?php
						}
					}
				?>
			</ul>
		</div>
	</div>
</div>
<span style="padding-top: 80px;"></span>


<?php /*********************************************************************************************/
    foreach($submenu as $chave => $itens){ ?>
    	<ul id="<?php echo $chave;?>" class="dropdown-menu" role="menu" style="display: none;z-index: 1030;">
		<?php foreach($itens as $itemMenu){

			$link = criaLink($itemMenu);
	    		if($link){
	    		?>
					<li>
						<?php echo $link; ?>
					</li>
				<?php
			}
		}?>
		</ul>
	<?php }