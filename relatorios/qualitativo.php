<?php
	require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");
	require_once (RES.'head.php');

    $dt = $_GET["dt"];
    if($dt){

        $param = "SELECT
                    DATE_FORMAT(t2.tb002_in_time,'%H:%i:%s') AS DT,
                    t1.tb001_nome AS NOME,
                    t2.tb001_id AS ID_PESSOA
                 FROM portaria.tb002_checkin t2
                 LEFT JOIN portaria.tb001_pessoa t1 ON (t2.tb001_id = t1.tb001_id)
                 WHERE DATE(tb002_in_time) = STR_TO_DATE('$dt','%d/%m/%Y')
                 ORDER BY tb002_in_time ASC ";

        $sql_lista = $db->query($param);
    }
    ?>
    <h4>Portaria - Relatório de entradas dia: <?php echo $dt;?></h4>

    <table id='tbcheckin' class='table table-striped table-hover'>
        <tr>
            <th class='no-print'>Ver Detalhes</th>
            <th>Horário</th>
            <th>Nome</th>
        </tr>
        <?php
        $old_culto = '';
        if($sql_lista) while ($row = mysql_fetch_assoc($sql_lista) ) {
            $culto = getCulto($row['DT']);

            if($old_culto != $culto){
                echo "<tr><td colspan='3' class='info'><b>$culto</b></td></tr>";
                $old_culto = $culto;
            }
          ?>
            <tr>
                <td class='no-print'>
                    <a href='../pessoa/ver.php?id=<?php echo $row['ID_PESSOA'];?>'>
                        <i class='fa fa-search'></i>
                    </a>
                </td>
                <td><?php echo $row['DT'];?></td>
                <td><?php echo $row['NOME'];?></td>
            </tr>
        <?php } ?>
    </table>

<?php require_once(RES."footer.php");
