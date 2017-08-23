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
        echo "<h4>Pessoa não encontrada :/</h4>";
    }else{
        extract($row); ?>
        <h4></h4>


        <div class='well'>
            <div class='divlinha'>
                <div class='conjunto'>
                    <div class='rotulo'><b style='font-size:18px'>#<?php echo $ID;?></b></div>
                    <div class='campo' style='padding-top:5px'><i>Cadastrado em : <?php echo $DT_CAD;?></i></div>
                </div>
            </div>

            <div class='divlinha'>
                <div class='conjunto'>
                    <div class='rotulo'>Nome:</div>
                    <div class='campo'><input type='text' name='nome' id='nome' readonly value='<?php echo $NOME;?>'></div>
                </div>
            </div>

            <div class='divlinha'>
                <div class='conjunto'>
                    <div class='rotulo'>Telefone:</div>
                    <div class='campo'><input type='text' name='telefone' id='telefone' readonly value='<?php echo $TELEFONE;?>'></div>
                </div>
            </div>

            <div class='divlinha'>
                <div class='conjunto'>
                    <div class='rotulo'>Ativo:</div>
                    <div class='campo'>
                        <select name='ativo' id='ativo' dislabled='true'>
                            <option value='1'>SIM</option>
                            <option value='2'>NÃO</option>
                        </select>
                        <script>$('#ativo').val('<?php echo $ATIVO;?>');</script>
                    </div>
                </div>
            </div>

            <div class='no-print'>
                <br><br><br>Informações não editáveis ainda
            </div>
        </div>

        <div class='well'>
            <h4>Histórico</h4>
            <table class='table table-striped table-hover'>
                <tr>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Crachá</th>
                </tr>
            <?php
                $param_h = "SELECT
                                DATE_FORMAT(t2.tb002_in_time,'%d/%m/%Y %H:%i:%s') AS IN_TIME,
                                DATE_FORMAT(t2.tb002_out_time,'%d/%m/%Y %H:%i:%s') AS OUT_TIME,
                                tb002_cracha AS CRACHA
                            FROM portaria.tb002_checkin t2
                            WHERE tb001_id =  $id
                            ORDER BY tb002_in_time DESC";

                $sql_h = $db->query($param_h);

                while($row = mysql_fetch_assoc($sql_h)){ ?>
                    <tr>
                        <td><?php echo $row['IN_TIME'];?></td>
                        <td><?php echo $row['OUT_TIME'];?></td>
                        <td><?php echo $row['CRACHA'];?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php  }