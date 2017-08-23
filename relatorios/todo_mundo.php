<?php
	require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");
	require_once (RES.'head.php');

    $param = "SELECT
                ID,
                NOME,
                TELEFONE,
                ATIVO,
                DATE_FORMAT(CAD,'%d/%m/%Y %H:%i:%s') AS CADASTRO,
                DATE_FORMAT(LCKIN,'%d/%m/%Y %H:%i:%s') AS LAST_CHECKIN
            FROM (
            SELECT
                tb001_id AS ID,
                tb001_nome AS NOME,
                tb001_telefone AS TELEFONE,
                tb001_ativo AS ATIVO,
                tb001_dt_cadastro AS CAD,
                (SELECT MAX(tb002_in_time) FROM portaria.tb002_checkin t2 WHERE t2.tb001_id = t1.tb001_id) AS LCKIN
            FROM portaria.tb001_pessoa t1
            ) T
             ORDER BY NOME ASC ";

    $sql_lista = $db->query($param);

    ?>
    <h4>Portaria - Relat�rio Todos Cadastrados</h4>

    <table id='tbcheckin' class='table table-striped table-hover'>
        <tr>
            <th class='no-print'>Ver Detalhes</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ativo</th>
            <th>Data de Cadastro</th>
            <th>�ltimo Check-in</th>
        </tr>
        <?php
         while ($row = mysql_fetch_assoc($sql_lista) ) { ?>
            <tr>
                <td class='no-print'>
                    <a href='../pessoa/ver.php?id=<?php echo $row['ID'];?>'>
                        <i class='fa fa-search'></i>
                    </a>
                </td>
                <td><?php echo $row['NOME'];?></td>
                <td><?php echo $row['TELEFONE'];?></td>
                <td><?php echo ($row['ATIVO'] ? 'SIM':'N�O');?></td>
                <td><?php echo $row['CADASTRO'];?></td>
                <td><?php echo $row['LAST_CHECKIN'];?></td>
            </tr>
        <?php } ?>
    </table>

<?php require_once(RES."footer.php");
