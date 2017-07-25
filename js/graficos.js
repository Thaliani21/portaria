function getGrafico(width,height){
	if(!width){		width = 400;	}
	if(!height){	height = 400;	}


	var divgrafico = $('<canvas/>').attr('height',height).attr('width',width); /* Criar canvas para conter o grafico*/

	$("#myChart").append(divgrafico); /* add canvas a div*/

	var ctx = divgrafico.get(0).getContext("2d");

	return ctx;
}

function graficoxyMensalAno(){

	var grafxy = graficos.grafxy;

	$.each(grafxy.datasets, function(i, item) {
		var data = $.map(item.data, function(value, index) {
				return [value];
		});
		grafxy.datasets[i].data = data;
	});

	var options = { pointDotRadius : 3, pointDot : false };

	var ctx = getGrafico();

	//ctx = getGrafico();
	var grafico = new Chart(ctx).Line(grafxy,options);

}

function tabelaxyMensalAnual(){

	var grafxy = graficos.grafxy;

	var cabecalho = $('<tr/>');

	cabecalho.append($('<th/>').html('ANO'));
	$.each(grafxy.labels,function(i,item){
		cabecalho.append($('<th/>').html(item));
	});

	var tab = $('<table/>').addClass('table');
	tab.append(cabecalho);

	$.each(grafxy.datasets,function(i,item){
		var linha = $('<tr/>').css('background',item.strokeColor);

		linha.append($('<td/>').html(item.ano));
		$.each(item.data,function(ind,valor){
			linha.append($('<td/>').html(valor));
		});

		tab.append(linha);
	});


	$('#myChart').append(tab)

}

function graficoPizzaMensalAno(){

	var tabela = $('<table/>').addClass('table');
	var cabecalho = $('<tr/>').append('<th/>').html('&nbsp;');
	$.each(tipos,function(index,nome){
		if(nome){
			cabecalho.append($('<th/>').html(nome));
		}
	});

	tabela.append(cabecalho);

	options = [];

	$.each(graficos.tipos,function(ano,meses){

		$.each(meses,function(mes,tipos){

			$("#myChart").append('<b>'+ano+'/'+mes+'</b>');
			grf = new Chart(getGrafico()).Pie(tipos,options);

			line = $('<tr/>').append($('<td/>').html(ano+'/'+mes)).css('text-align','right');
			$.each(tipos,function(i,tipo){
				line.append( $('<td/>').css('background',tipo.color).html(tipo.value));
			});

			tabela.append(line);
		});

	});

	$("#myChart").append(tabela);
}

/*
 GRAFICOS DE ACIDENTES
*/


options = [];
function graficoPizzaAcidentes(){

	var tabela = $('<table>').addClass('table table-striped table-hover');

	//PIZZA
	$.each(grafico,function(i,itm){
		tabela.append( $('<tr>').attr('colspan',3).append( $('<th/>').html(itm.titulo)) );

		$("#myChart").append('<b>'+itm.titulo+'</b>');
		grf = new Chart(getGrafico()).Pie(itm.dados,options);


		$.each(itm.dados, function(i,item){
			tabela.append( $('<tr>')
				.append($('<td>').html(item.label))
				.append($('<td>').html(parseInt(item.value*100)/100+"%"))
				.append($('<td>').html(item.qtd))
				)

		});

	});

	$("#myChart").append(tabela);
}

var grfBarra;
function graficoBarraAcidentes(){
	var tabela = $('<table>').addClass('table table-striped table-hover');

	//BARRAS
	$.each(grafico2,function(i,itm){
		tabela.append( $('<tr>').attr('colspan','3').append( $('<th/>').html(itm.titulo)) );

		difStep = 5;
		maxStep = itm.datasets[0].data[0];
		if(maxStep){ maxStep = maxStep /difStep; }

		$("#myChart").append('<b>'+itm.titulo+'</b>');
		grfBarra = new Chart(getGrafico(800,400)).Bar(itm, {
			scaleShowGridLines : false,
			scaleGridLineWidth : 1,
			barShowStroke: true,
			barStrokeWidth : 2,
			barValueSpacing : 2,
			barDatasetSpacing : 4,
			scaleOverride: true,
			scaleStartValue: 0,
			scaleStepWidth: difStep,
			scaleSteps: maxStep
		});


		$.each(itm.labels, function(i,item){
			tabela.append( $('<tr>')
				.append($('<td>').html(item))
				.append($('<td>').attr('colspan',2).html(itm.datasets[0].data[i]))
				)

		});

	});

	$("#myChart").append(tabela);
}