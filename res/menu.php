<?php

$menu = array(
	array( 'titlulo' => "Check-Out", 'class' => "btn btn-default", 'onclick' => "showCheckout();",  'icon' => "fa fa-level-up" ),
	array( 'titlulo' => "Relatórios", 'class' => "btn btn-inverse", 'onclick' => "showMenu(this,'menu1');",  'icon' => "fa fa-list-alt icon-white" ),
);

$submenu['menu1'][] = array('href' => CAMINHO_SIS."funcionario/funcionario_novo.php", 'titlulo' => "Novo Funcionário", 'permissao' => array("CADASTRO"), 'sem_permissao' => array("RH") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."funcionario/funcionario_listall.php?sl_status=A", 'titlulo' => "Lista de Funcionários", 'permissao' => array("ATIVO") );
$submenu['menu1'][] = array('class' =>'divider' );

$submenu['menu1'][] = array('href' => CAMINHO_SIS."acidente/acidente_listall.php", 'titlulo' => "Acidentes", 'permissao' => array("ACIDENTES") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."ambulatorio/lista_setores.php", 'titlulo' => "Agendamento Periódicos Setor", 'permissao' => array("AGENDAMENTOS") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."atendimento/atendimento_listall.php", 'titlulo' => "Atendimentos", 'permissao' => array("RH") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."autorizacao/autorizacao_listall.php", 'titlulo' => "Autorizações Odonto/Psico", 'permissao' => array("PERIODICOS") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."estoque/estoque_listall.php", 'titlulo' => "Estoque", 'permissao' => array("ESTOQUE") );
$submenu['menu1'][] = array('onclick' => "gMS(this,'menu103');", 'titlulo' => "Financeiro", 'permissao' => array("CADASTRO") );
$submenu['menu1'][] = array('onclick' => "gMS(this,'menu102');", 'titlulo' => "Folga Compensatória", 'permissao' => array("FOLGAS_COMPENSATORIAS") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."grupo/grupo_listall.php", 'titlulo' => "Grupos de Funcionários", 'permissao' => array("ATIVO") );
$submenu['menu1'][] = array('onclick' => "gMS(this,'menu104');", 'titlulo' => "Planejamento", 'permissao' => array("CADASTRO") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."recomendacao/recomendacao_listall.php", 'titlulo' => "Recomendações Médicas", 'permissao' => array("RECOMENDACAO","RH"), 'sem_permissao' => array("LIDER") );
$submenu['menu1'][] = array('onclick' => "gMS(this,'menu101');", 'titlulo' => "Treinamentos", 'permissao' => array("TREINAMENTO") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."trocaDeFolga/trocaDeFolga_listall.php", 'titlulo' => "Troca de Folga", 'permissao' => array("CADASTRO") );
$submenu['menu1'][] = array('href' => CAMINHO_SIS."recomendacao/recomendacao_pendentesFunc_small.php", 'titlulo' => "Recomendações Médicas", 'permissao' => array("RECOMENDACAO","LIDER"), 'sem_permissao' => array("RH") );


$submenu['menu101'][] = array('href' => CAMINHO_SIS."treinamento/treinamento_listall.php", 'titlulo' => "Lista de Treinamentos", 'permissao' => array("ATIVO") );
$submenu['menu101'][] = array('href' => CAMINHO_SIS."treinamento/treinamento_funcionario_listall.php", 'titlulo' => "Treinamento de Funcionários", 'permissao' => array("TREINAMENTO") );

$submenu['menu102'][] = array('href' => CAMINHO_SIS."folga_compensatoria/folga_listall.php", 'titlulo' => "Criar/Editar Dia da Folga", 'permissao' => array("FOLGAS_COMPENSATORIAS") );
$submenu['menu102'][] = array('href' => CAMINHO_SIS."folga_compensatoria/folga_funcionario_listall.php", 'titlulo' => "Associar Funcionários à Folga", 'permissao' => array("FOLGAS_COMPENSATORIAS") );
$submenu['menu102'][] = array('href' => CAMINHO_SIS."folga_compensatoria/folgas_pendentes.php", 'titlulo' => "Funcionários com Folgas Pendentes", 'permissao' => array("FOLGAS_COMPENSATORIAS") );

$submenu['menu103'][] = array('href' => CAMINHO_SIS."financeiro/local/local_listall.php", 'titlulo' => "Locais", 'permissao' => array("CADASTRO") );
$submenu['menu103'][] = array('href' => CAMINHO_SIS."financeiro/valorRolo/rolo_listall.php", 'titlulo' => "Valor do Rolo", 'permissao' => array("CADASTRO") );
$submenu['menu103'][] = array('href' => CAMINHO_SIS."financeiro/roll/roll_listall.php", 'titlulo' => "Lcto. de Roll", 'permissao' => array("CADASTRO") );
$submenu['menu103'][] = array('href' => CAMINHO_SIS."financeiro/despesasMateriais/despesa_listall.php", 'titlulo' => "Lcto. de Despesas", 'permissao' => array("CADASTRO") );

$submenu['menu104'][] = array('href' => CAMINHO_SIS."planejamento/fds/planejamento_listall.php", 'titlulo' => "Fim de Semana", 'permissao' => array("CADASTRO") );
$submenu['menu104'][] = array('href' => CAMINHO_SIS."planejamento/cobertura/planejamento_listall.php", 'titlulo' => "Cobertura Ausência", 'permissao' => array("CADASTRO") );

//$submenu['menu2'][] = array('onclick' => "gMS(this,'menu201')", 'titlulo' => "EPI", 'permissao' => array("ADMIN_RH") );
$submenu['menu2'][] = array('href' => CAMINHO_SIS."epi/tipo_epi/tipoEpi_listall.php", 'titlulo' => "Tipos de EPI", 'permissao' => array("ADMIN_RH") );
$submenu['menu2'][] = array('href' => CAMINHO_SIS."epi/funcao_especial/funcaoEspecial_listall.php", 'titlulo' => "Funções Epeciais", 'permissao' => array("ADMIN_RH") );
$submenu['menu2'][] = array('href' => CAMINHO_SIS."epi/entrega/entrega_listall.php", 'titlulo' => "Entrega Material", 'permissao' => array("ADMIN_RH") );

$submenu['menu6'][] = array('href' => CAMINHO_SIS."permissao/permissao_listall.php", 'titlulo' => "Contas e Acessos", 'permissao' => array("ADMIN") );
$submenu['menu6'][] = array('href' => CAMINHO_SIS."turno/turno_listall.php", 'titlulo' => "Turnos", 'permissao' => array("ADMIN") );
$submenu['menu6'][] = array('href' => CAMINHO_SIS."local_trabalho/local_listall.php", 'titlulo' => "Local de Trabalho", 'permissao' => array("ADMIN") );
$submenu['menu6'][] = array('onclick' => "gMS(this,'menu601')", 'titlulo' => "Autorizações", 'permissao' => array("RH") );
$submenu['menu6'][] = array('href' => CAMINHO_SIS."medico/medico_listall.php", 'titlulo' => "Médicos", 'permissao' => array("ADMIN") );
$submenu['menu6'][] = array('onclick' => "gMS(this,'menu602')", 'titlulo' => "Unimed", 'permissao' => array("RH") );


$submenu['menu601'][] = array('href' => CAMINHO_SIS."autorizacao/tipo_listall.php", 'titlulo' => "Tipos de Autoriz.", 'permissao' => array("RH") );
$submenu['menu601'][] = array('href' => CAMINHO_SIS."autorizacao/clinica_listall.php", 'titlulo' => "Clinicas", 'permissao' => array("RH") );

$submenu['menu602'][] = array('href' => CAMINHO_SIS."unimed/processa_beneficiarios_inativos.php", 'titlulo' => "Proc. Benef. Ativos", 'permissao' => array("RH") );



$submenu['menu3'][] = array('onclick' => "gMS(this,'menu301');", 'titlulo' => "Limpeza e Conservação", 'permissao' => array("CADASTRO") );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu302');", 'titlulo' => "RH", 'permissao' => array("RH") );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu303');", 'titlulo' => "Quantitativo", 'permissao' => array() );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu3011');", 'titlulo' => "Folgas", 'permissao' => array("RELATORIO") );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu304');", 'titlulo' => "Financeiro", 'permissao' => array("RELATORIO") );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu305');", 'titlulo' => "Atendimento", 'permissao' => array("RELATORIO") );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu306')", 'titlulo' => "Planejamento", 'permissao' => array("RELATORIO") );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu307')", 'titlulo' => "Estoque", 'permissao' => array("ESTOQUE") );
$submenu['menu3'][] = array('onclick' => "gMS(this,'menu308')", 'titlulo' => "E-social", 'permissao' => array("RELATORIO") );

$submenu['menu301'][] = array('href' => CAMINHO_SIS."relatorio/ausencia/ausencia_mensal_listall.php", 'titlulo' => "Ausencia Mensal", 'permissao' => array("RELATORIO") );
$submenu['menu301'][] = array('href' => CAMINHO_SIS."relatorio/ausencia/ausencia_SID.php", 'titlulo' => "Ausencia SID", 'permissao' => array("RELATORIO") );
$submenu['menu301'][] = array('href' => CAMINHO_SIS."relatorio/lista_ciencia.php", 'titlulo' => "Ciência de Documentos", 'permissao' => array("RELATORIO") );
$submenu['menu301'][] = array('onclick' => "gMS(this,'menu3012');", 'titlulo' => "Férias", 'permissao' => array("RELATORIO") );
$submenu['menu301'][] = array('onclick' => "gMS(this,'menu3013');", 'titlulo' => "Material", 'permissao' => array("RELATORIO") );

$submenu['menu3011'][] = array('href' => CAMINHO_SIS."relatorio/folga/func_folga.php", 'titlulo' => "Funcionarios X Folgas", 'permissao' => array("RELATORIO") );
$submenu['menu3011'][] = array('href' => CAMINHO_SIS."relatorio/folga/func_folga_qt.php", 'titlulo' => "Funcionarios X Folgas QTD", 'permissao' => array("RELATORIO") );
$submenu['menu3011'][] = array('href' => CAMINHO_SIS."funcionario/folgasMes_listall.php", 'titlulo' => "Aniversario Geral", 'permissao' => array("RH","CADASTRO") );
$submenu['menu3011'][] = array('href' => CAMINHO_SIS."relatorio/folga/func_folga_aniv.php", 'titlulo' => "Aniversario Grupo", 'permissao' => array("RELATORIO") );
$submenu['menu3011'][] = array('href' => CAMINHO_SIS."relatorio/folga/lista_impressa.php", 'titlulo' => "Folgas Impressa", 'permissao' => array("RELATORIO") );

$submenu['menu3012'][] = array('href' => CAMINHO_SIS."ferias/imprimir_folhas.php", 'titlulo' => "Férias Impressa", 'permissao' => array("RELATORIO") );

$submenu['menu3013'][] = array('href' => CAMINHO_SIS."relatorio/material/material_funcionario.php", 'titlulo' => "Funcionario", 'permissao' => array("RELATORIO") );
$submenu['menu3013'][] = array('href' => CAMINHO_SIS."relatorio/material/material_quantitativo.php", 'titlulo' => "Quantitativo", 'permissao' => array("RELATORIO") );
$submenu['menu3013'][] = array('href' => CAMINHO_SIS."relatorio/material/material_alteracoes.php", 'titlulo' => "Pesquisa Alterações", 'permissao' => array("RELATORIO") );

$submenu['menu302'][] = array('href' => CAMINHO_SIS."relatorio/ambulatorio/periodicos.php", 'titlulo' => "Controle", 'permissao' => array("ADMIN_RH") );
$submenu['menu302'][] = array('href' => CAMINHO_SIS."relatorio/ambulatorio/atendimentos.php", 'titlulo' => "Atendimentos", 'permissao' => array("AMBULATORIO") );
$submenu['menu302'][] = array('href' => CAMINHO_SIS."relatorio/ambulatorio/exportar.php", 'titlulo' => "Atendimentos Exportar", 'permissao' => array("ADMIN_RH") );
$submenu['menu302'][] = array('href' => CAMINHO_SIS."relatorio/ambulatorio/periodicos_vencidos.php", 'titlulo' => "Per. Vencidos", 'permissao' => array("AMBULATORIO") );
$submenu['menu302'][] = array('href' => CAMINHO_SIS."relatorio/funcionario/listaAtivos.php", 'titlulo' => "Ativos", 'permissao' => array("ADMIN_RH") );
$submenu['menu302'][] = array('href' => CAMINHO_SIS."relatorio/acidente/quantitativo.php", 'titlulo' => "Acidentes", 'permissao' => array("ADMIN_RH") );
$submenu['menu302'][] = array('href' => CAMINHO_SIS."relatorio/ausencia/ausencia_vigente_listall.php", 'titlulo' => "Afastamentos", 'permissao' => array("RH") );

$submenu['menu303'][] = array('href' => CAMINHO_SIS."relatorio/funcionario/quantitativos_sexo.php", 'titlulo' => "Por Sexo", 'permissao' => array() );

$submenu['menu304'][] = array('href' => CAMINHO_SIS."relatorio/financeiro/despesa.php", 'titlulo' => "Despesa", 'permissao' => array() );
$submenu['menu304'][] = array('href' => CAMINHO_SIS."relatorio/financeiro/consumo.php", 'titlulo' => "Consumo", 'permissao' => array() );

$submenu['menu305'][] = array('href' => CAMINHO_SIS."relatorio/atendimento/quantitativo.php", 'titlulo' => "Quantitativo", 'permissao' => array() );
$submenu['menu305'][] = array('href' => CAMINHO_SIS."relatorio/atendimento/qualitativo.php", 'titlulo' => "Qualitativo", 'permissao' => array() );

$submenu['menu306'][] = array('href' => CAMINHO_SIS."relatorio/planejamento/coberturas.php", 'titlulo' => "Coberturas", 'permissao' => array("RELATORIO") );
$submenu['menu306'][] = array('href' => CAMINHO_SIS."relatorio/planejamento/coberturas_fds.php", 'titlulo' => "Coberturas FDS", 'permissao' => array("RELATORIO") );

$submenu['menu307'][] = array('href' => CAMINHO_SIS."relatorio/estoque/consumo.php", 'titlulo' => "Consumo", 'permissao' => array() );

$submenu['menu308'][] = array('href' => CAMINHO_SIS."relatorio/e-social/funcionario_fe_epi.php", 'titlulo' => "EPIs por Funcionário", 'permissao' => array() );
$submenu['menu308'][] = array('href' => CAMINHO_SIS."relatorio/e-social/epi_fe_funcionario.php", 'titlulo' => "Funcionários por EPI", 'permissao' => array() );
$submenu['menu308'][] = array('href' => CAMINHO_SIS."relatorio/e-social/funcionario_fe.php", 'titlulo' => "Funções Esp. por Funcionário", 'permissao' => array() );
$submenu['menu308'][] = array('href' => CAMINHO_SIS."relatorio/e-social/fe_funcionario.php", 'titlulo' => "Funções Esp. lista de Funcionário", 'permissao' => array() );

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
				<img src="imagens/up.png" style='width:30px'>
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