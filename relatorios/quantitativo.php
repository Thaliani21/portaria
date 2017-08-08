<?php
	require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");
	require_once (RES.'head.php');

    $param = "SELECT
                DATE_FORMAT(tb002_in_time,'%d/%m/%Y %H') AS DT,
                COUNT(*) AS QTD
             FROM portaria.tb002_checkin
             GROUP BY DATE_FORMAT(tb002_in_time,'%d/%m/%Y %H')
             ORDER BY tb002_in_time DESC ";

    $sql_lista = $db->query($param);

    ?>
    <h4>Portaria - Relatório Quantitativo</h4>

    <table id='tbcheckin' class='table table-striped table-hover'>
        <tr>
            <th class='no-print'>Ver Detalhes</th>
            <th>Data Hora</th>
            <th>Quantidade</th>
        </tr>
        <?php
        $old_date = '';
        $old_mes = "";
         while ($row = mysql_fetch_assoc($sql_lista) ) {
            $mes = getNumMes(substr($row['DT'],3,2));
            if($old_mes != $mes){
                echo "<tr><td colspan='3' class='info'><b>$mes</b></td></tr>";
                $old_mes = $mes;
            }else if($old_date != substr($row['DT'],0,10) ){
                echo "<tr><td colspan='3'></td></tr>";
            }
            $old_date = substr($row['DT'],0,10);
          ?>
            <tr>
                <td class='no-print'>
                    <a href='qualitativo.php?dt=<?php echo $old_date;?>'>
                        <i class='fa fa-search'></i>
                    </a>
                </td>
                <td><?php echo $row['DT'];?></td>
                <td><?php echo $row['QTD'];?></td>
            </tr>
        <?php } ?>
    </table>

<?php require_once(RES."footer.php");
