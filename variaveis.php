<?php
    session_start();

	/*Definicoes do Sistema*/
	$appname = "/portaria/";
	$caminho = "http://".$_SERVER['SERVER_NAME'] .$appname;
	$path = $_SERVER['DOCUMENT_ROOT'].$appname;
	/**/

	if($_SERVER["HTTP_REFERER"] != "http://".$_SERVER['SERVER_NAME']. $_SERVER["REQUEST_URI"]){
		$_SESSION['referer'] = $_SERVER["HTTP_REFERER"];
	}

    define("CAMINHO_IMG", $caminho."imagens/");

    define("CAMINHO_SIS", $caminho);
    define("PATH_SIS", $path);

    define("CSS", $caminho."css/");

    define("JS", $caminho."js/");

	define ("RES", $path."res/");

    /*Base de dados*/
    define("DB_USER","root");
    define("DB_PW","");
    define("DB_SERVER","127.0.0.1");
    require_once (RES.'banco.php');
    /**/

    require_once (RES.'funcoes.php');

    $protect = array("'"=>"",'"'=>'');
    $appname = str_replace('/','',$appname);
    /**/

    ini_set( 'default_charset', 'iso-8859-1');