<?php
    require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");

    $busca = protect($_REQUEST['busca']);

	$arr = array();
	if($busca){
	    $param = "SELECT
	    			tb001_id AS ID,
	    			tb001_nome AS NOME,
	    			tb001_telefone AS TELEFONE
	              FROM portaria.tb001_pessoa
	              WHERE tb001_ativo = 1
	              AND tb001_nome LIKE '%$busca%'
	              ORDER BY tb001_nome";

	    $sql = $db->query($param);

	    while( $row = mysql_fetch_assoc($sql)){
    		$arr[] = array_map('utf8_encode',$row);
    	}
    }

	echo json_encode($arr);