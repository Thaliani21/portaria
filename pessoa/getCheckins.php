<?php
    require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");

    /*
    SELECT A LISTA DO DIA 6 horas
    */

    $param_lista = "SELECT
                        tb001_nome AS NOME,
                        tb001_telefone AS TELEFONE,
                        tb002_cracha AS CRACHA,
                        DATE_FORMAT(tb002_in_time,'%d/%m/%Y %H:%i:%s') AS INTM,
                        DATE_FORMAT(tb002_out_time,'%H:%i:%s') AS OUTTM
                     FROM portaria.tb002_checkin t2
                     LEFT JOIN portaria.tb001_pessoa t1 ON (t2.tb001_id = t1.tb001_id)
                     WHERE tb002_in_time > DATE_SUB(NOW(), INTERVAL 6 HOUR)";

    $sql_lista = $db->query($param_lista);

    $i = 0;
    $arr = array();
    while ($row = mysql_fetch_assoc($sql_lista) ) {
        $i++;
        $arr[$i] = array_map('utf8_encode',$row);
    }

    echo json_encode($arr);