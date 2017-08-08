<?php

function protect($var){
	global $protect;
	return strtr($var,$protect);
}

function firstword($nomew){
	$arr = explode(' ',$nomew);
	return $arr[0];
}

function sqlDate($dt,$mask='DD/MM/YYYY'){
	$maskSize = strlen($mask);
	if($maskSize > 10){
		$maskSize = $maskSize -2;
	}

	if( strlen($dt) == $maskSize ){
		$data = "TO_DATE('$dt','$mask')";
	}else{
		$data = 'null';
	}
	return $data;
}

/*Hora1 menos a hora2*/
function difdehora($hora1, $hora2){

	$hh1 = substr($hora1,0,2);
	$hm1 = substr($hora1,3,2);

	$hh2 = substr($hora2,0,2);
	$hm2 = substr($hora2,3,2);

	$hora1 = $hh1 * 60 + $hm1;
	$hora2 = $hh2 * 60 + $hm2;

	$diff = $hora1 - $hora2;

	/*
		Então, aqui agora tem um tratamento de resultado
		porque quando vira o dia, dá um erro de resultado.
	*/
	if($diff > 1000){ $diff = $diff - (24 * 60);  }
	if($diff < -1000){ $diff = $diff + (24 * 60);  }
	/**/


	return $diff;
}


function diferencaDias($data1,$data2){
		$dd1 = substr($data1,0,2);
		$mm1 = substr($data1,3,2);

		$yy1 = substr($data1,6,4);
		$dd2 = substr($data2,0,2);

		$mm2 = substr($data2,3,2);
		$yy2 = substr($data2,6,4);

		$date1 = mktime(0,0,0,$mm1,$dd1,$yy1);
		$date2 = mktime(0,0,0,$mm2,$dd2,$yy2);

		$diff = $date1-$date2;
		$fullDays = floor($diff/(60*60*24))+1;
		return $fullDays;
	}

function getNumMes($mes){
	switch($mes) {
		case"01": $numMes = "Janeiro";	break;
		case"02": $numMes = "Fevereiro";	break;
		case"03": $numMes = "Março";	break;
		case"04": $numMes = "Abril";	break;
		case"05": $numMes = "Maio";	break;
		case"06": $numMes = "Junho";	break;
		case"07": $numMes = "Julho";	break;
		case"08": $numMes = "Agosto";	break;
		case"09": $numMes = "Setembro";	break;
		case"10": $numMes = "Outubro";	break;
		case"11": $numMes = "Novembro";	break;
		case"12": $numMes = "Dezembro";	break;
	}
	return 	$numMes;
}

function diaDaSemana($d){
	$arr_d = explode("/", $d);
	$d = date('w',mktime(0,0,0,$arr_d[1],$arr_d[0],$arr_d[2]));

	$arr_dias= array(
		0 => 'Domingo',
		1 => 'Segunda-feira',
		2 => 'Terça-feira',
		3 => 'Quarta-feira',
		4 => 'Quinta-feira',
		5 => 'Sexta-feira',
		6 => 'Sábado',
	);
	return $arr_dias[$d];
}

function trataEntrada($var){
	$var = str_replace('"','&#34;',$var); //aspas duplas
	$var = str_replace("'",'&#39;',$var); //aspas simples
	return $var;
}

function trataSaida($var){
	//$var = str_replace("`","'",$var);
	$var = str_replace('&#34;','"',$var); //aspas duplas
	$var = str_replace('&#39;',"'",$var); //aspas simples
	$var = str_replace('¿',"-",$var); //hifen grande
	return $var;
}

function dinheiroPrint($valor){
	return number_format(str_replace(',','.',$valor), 2, "," , ".");
}


function getCulto($hora){
	$hh = str_replace(":","", substr($hora,0,5));
	if($hh < 1030) return "Manhã 1";
	else if($hh < 1500) return "Manhã 2";
	return "Noite";
}