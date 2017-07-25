<?php
    require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");

    $nome = protect($_REQUEST['nome']);
    $telefone = protect($_REQUEST['telefone']);
    $cracha = protect($_REQUEST['cracha']);

    $param = "SELECT tb001_id AS ID
              FROM portaria.tb001_pessoa
              WHERE tb001_ativo = 1
              AND tb001_nome = '$nome'
              AND tb001_telefone = '$telefone'";

    $sql = $db->query($param);

    $row = mysql_fetch_assoc($sql);

    if($row){
        //insere só o checkin
        $id = $row['ID'];
        $doCheckin = true;
    }else{
        //insere a pessoa
        $param_id = "SELECT COALESCE(MAX(tb001_id),0)+1 AS NEWID FROM portaria.tb001_pessoa ";
        $sql_id = $db->query($param_id);
        $row = mysql_fetch_assoc($sql_id);

        //echo "<pre>";print_r($row);die;
        $id = $row['NEWID'];

        $param_ins = "INSERT INTO portaria.tb001_pessoa(
                        tb001_id,
                        tb001_nome,
                        tb001_telefone
                    )VALUES(
                        $id,
                        '$nome',
                        '$telefone'
                    )";

        $sql_ins = $db->query($param_ins);

        if($sql_ins){
            $doCheckin = true;
        }else{
            echo "Não inseriu o nome";
        }
    }

    if($doCheckin){
        $param_ck = "INSERT INTO portaria.tb002_checkin (
                        tb001_id,
                        tb002_cracha
                    ) VALUES (
                        $id,
                        '$cracha'
                    )";

        $sql_ck = $db->query($param_ck);

        if($sql_ck){
            echo "OK";
        }else{
            echo "Erro ao fazer checkin";
        }
    }else{
        echo "nada feito";
    }