<?php
    /* Paginação (parte1)*/
    $pg = $_GET['pg'];
    if(!$numreg) $numreg = 30;
    if (!$pg) $pg = 1;
    $final = $pg * $numreg;
    $inicial = ($pg-1) * $numreg;
    /*FIM Paginação (parte1)*/
?><html>
<head>
    <title><?php echo $appname;?></title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

    <link rel="shortcut ico" href="<?php echo $caminho;?>imagens/up.jpg">
    <link rel="apple-touch-icon image_src" href="<?php echo $caminho;?>imagens/up.jpg">
    <meta property="og:image" itemprop="image primaryImageOfPage" content="<?php echo $caminho;?>imagens/up.jpg">


    <!-- JQuery -->
    <script src='<?php echo JS ?>jquery-2.1.3.min.js' type='text/javascript'></script>
    <!-- Javascript -->
    <script src='<?php echo JS ?>meiomask.js' type='text/javascript'></script>
    <script src='<?php echo JS ?>utils.js' type='text/javascript'></script>
    <script src='<?php echo JS ?>portaria.js' type='text/javascript'></script>
    <script> var caminho = '<?php echo $caminho;?>';</script>

    <!-- CSS -->
    <!-- bootstrap -->
    <script src='<?php echo CSS ;?>bootstrap/js/bootstrap.min.js' type='text/javascript'></script>
    <link href="<?php echo CSS ;?>bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo CSS ;?>font-awesome-4.5/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo CSS ;?>noPrint.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo JS ?>jquery.toast/jquery.toast.min.css" type="text/css">
    <script src='<?php echo JS ?>jquery.toast/jquery.toast.min.js' type='text/javascript'></script>

    <!-- CSS -->
    <link href="<?php echo CSS ;?>default1.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS ;?>portaria.css" rel="stylesheet" type="text/css" />



</head>
<body align="center" width="100%" style='display:block;padding-top:45px'>
    <?php
        require_once (RES."menu.php");
    ?>

    <div class='do-print' style='text-align: left;margin-bottom: 20px;padding-left: 180px;'>
        <img src='<?php echo CAMINHO_IMG;?>up.jpg' style='position:absolute;left:100px; width: 50px; top:60px'>
        <h4>PIB - Primeira Igrja Batista de Curitiba.<br>
            UP - Ministério de pré-adolescentes<br>
        Portaria - Gestão de Entrada de pré-adolescentes</h4>
    </div>