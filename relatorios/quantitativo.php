<?php
	require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");
	require_once (RES.'head.php');

    $param = "SELECT 
				COUNT(*) AS QTD, DT,HR FROM(
			    SELECT
			        DATE(tb002_in_time) AS DT,                
			        DATE_FORMAT(tb002_in_time,'%H') AS HR
			    FROM portaria.tb002_checkin
			) T1
			GROUP BY DT, HR
			ORDER BY DT DESC, HR ";

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
            $mes = getNumMes(substr($row['DT'],5,2));
            if($old_mes != $mes){
                echo "<tr class='info'><td></td><td colspan='2' ><b>$mes</b></td></tr>";
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
                <td><?php echo $row['DT']." ".$row['HR'];?></td>
                <td><?php echo $row['QTD'];?></td>
            </tr>
        <?php } ?>
    </table>

<?php require_once(RES."footer.php");
