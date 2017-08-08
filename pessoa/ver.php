<?php
    require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");
    require_once (RES.'head.php');

    $id = intval($_REQUEST['id']);

	$arr = array();
	if($id){
	    $param = "SELECT
	    			tb001_id AS ID,
	    			tb001_nome AS NOME,
	    			tb001_telefone AS TELEFONE,
                    tb001_ativo AS ATIVO,
                    DATE_FORMAT(tb001_dt_cadastro,'%d/%m/%Y %H:%i') AS DT_CAD
	              FROM portaria.tb001_pessoa
	              WHERE tb001_id = $id ";

	    $sql = $db->query($param);

	    $row = mysql_fetch_assoc($sql);
    }

    if(!$row){
        echo "<h4>Pessoa não encontrada :/";
    }else{
        extract($row); ?>
        <h4><?php echo $ID;?></h4>
        <i>Cadastrado em : <?php echo $DT_CAD;?></i>
        <br>
        <b>Nome:</b>
        <input type='text' name='nome' id='nome' readonly value='<?php echo $NOME;?>'>
        <br>
        <b>Telefone:</b>
        <input type='text' name='telefone' id='telefone' readonly value='<?php echo $TELEFONE;?>'>
        <br>
        <b>Ativo:</b>
        <select name='ativo' id='ativo' dislabled='true'>
            <option value='1'>SIM</option>
            <option value='2'>NÃO</option>
        </select>
        <script>$('#ativo').val('<?php echo $ATIVO;?>');</script>

        <div class='no-print'>
            <br><br><br>Informações não editáveis ainda
        </div>
    <?php  }