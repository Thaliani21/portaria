<?php
    require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");

    $cracha = protect($_REQUEST['cracha']);

    if($cracha){

        $param = "UPDATE tb002_checkin SET
                  tb002_out_time = NOW()
                  WHERE tb002_cracha = '$cracha'
                  AND tb002_in_time > DATE_SUB(tb002_in_time, INTERVAL 6 HOUR)";

        $sql = $db->query($param);

        if($sql){
            if(mysql_affected_rows($db->con)){
                echo "OK";
            }else{
                echo "Crachá não encontrado";
            }
        }else{
            echo "Falha de banco";
        }
    }else{
        echo "Blé!";
    }