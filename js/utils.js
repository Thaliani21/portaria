    /**
	*	Funcao para esconder/mostrar elementos - compatibilidade
	*	@parameter mixed nomeDoObjeto
	*/
	function toggle(obj) {$('#'+obj).slideToggle();}

    /**
	*	Funcão que mostra e econde menu dropdown
	*	@parameter html_object objetoReferencia (this)
	*	@parameter mixed idDoMenu
	*/
	function showMenu(obj,divmenu){
		var rect = obj.getBoundingClientRect();
		$('#'+divmenu).css('top',rect.top+25).css('left',rect.left).slideToggle();
	}
    /**
	*	funcao retrocompativel, usar showMenu
	*/
	function gMS(obj,divmenu){ //manter retrocompatibilidade
		showMenu(obj,divmenu);
	}

    /**
	*	Funcao que abre uma janela modal na tela com botão de OK
	*	@parameter mixed titulo
	*	@parameter mixed oQueVaiDentroDaJanela texto/html/objJquery
	*/
	function geraAvisoOKModal(titulo,recheio){
		var container = $('<div>').addClass('modal').attr('id','avisoOKModal');
		var cabecalho = $('<div>').addClass('modal-header').
			append(
					$('<button>').addClass('close').attr('data-dismiss',"modal").attr('aria-hidden',"true").html("&times;")
				).
			append(
					$('<h3>').html(titulo)
				);
		var corpo = $('<div>').addClass('modal-body').html(recheio);
		var rodape = $('<div>').addClass('modal-footer').append(
				$('<button>').attr('data-dismiss',"modal").addClass('btn btn-primary').html('OK')
			);
		container.append(cabecalho).append(corpo).append(rodape);
		container.modal();
	}

    /**
	*	Função que redimensiona textarea para o conteúdo - NOVA
	*	@parameter htmlObject (this)
	*/
	function sz(t) {
		objT = $(t);
		a = objT.val().split('\n');
		newSz = a.length;
        $.each(a,function(i,itm){
            if(itm.length > 80){
                newSz += parseInt(itm.length / 80)+1;
            }
        });
        newSz =  18 * newSz;
		if (newSz > parseInt(objT.css('height')) ) objT.css('height',newSz);
	}

	/**
	*	Função que redimensiona textarea para o conteúdo - ANTIGA
	*	@parameter htmlObject (this)
	*/
	function szOld(t) {
		a = t.value.split('\n');
		b=1;
		for (x=0;x < a.length; x++) {
			if (a[x].length >= t.cols) b+= Math.floor(a[x].length/t.cols);
		}
		b+= a.length;
		if (b > t.rows) t.rows = b;
	}

	/**
	*	Função que abre uma tela modal com a confirmação de exclusão de um item
	*	@parameter mixed idDoItem
	*	@parameter mixed textoNomeDoElemento
	*	@parameter mixed elemento
	*/
	function excluir(id,txt,obj){
        var container = $('<div>').addClass('modal').attr('id','avisoOKModal');

        var cabecalho = $('<div>').addClass('modal-header')
        .append(
            $('<button>').addClass('close').attr('data-dismiss',"modal").attr('aria-hidden',"true").html("&times;")
        )
        .append(
            $('<h3>').html("Aviso de Exclusão")
        );

        var corpo = $('<div>').addClass('modal-body').html("<label>Tem certeza que deseja excluir "+txt+"?<br>"+
            "Essa operação não pode ser desfeita.</label>");

        var rodape = $('<div>').addClass('modal-footer')
        .append(
            $('<button>').attr('data-dismiss',"modal").addClass('btn btn-primary').html('Não')
        )
        .append($('<a/>').attr('href', obj+'_excluir.php?id='+id).addClass('btn btn-primary').html("Sim"));

        container.append(cabecalho).append(corpo).append(rodape);
        container.modal();
    }

	/**
	*	Função antiga que apresenta um aviso em tela (retrocompatibilidade para toast)
	*	@parameter mixed textoAApresentar
	*	@parameter mixed corDoAviso (verde/amarelo/vermelho)
	*/
    function launchWarning(data,level){
        if(level == 'verde'){
            cor = toast.types.VERDE;
        }else if(level == 'vermelho'){
            cor = toast.types.VERMELHO;
        }else{
            cor = toast.types.AZUL;
        }
        mensagemDeCanto(data,cor,toast.sticky.APAGAR);
    }

    /**
    *	Função que valida CPF
    * 	@parameter mixed cpf (com ou sem mascara)
    *	@returns boolean (true para valido)
    */
	function ValidarCPF(cpf){
	    var numeros, digitos, soma, i, resultado, digitos_iguais;
	    exp = /\.|\-/g
	    cpf = cpf.toString().replace( exp, "" );
	    digitos_iguais = 1;
	    if (cpf.length < 11)
	        return false;
	    for (i = 0; i < cpf.length - 1; i++)
	        if (cpf.charAt(i) != cpf.charAt(i + 1)){
	            digitos_iguais = 0;
	            break;
	        }
	    if (!digitos_iguais){
	        numeros = cpf.substring(0,9);
	        digitos = cpf.substring(9);
	        soma = 0;
	        for (i = 10; i > 1; i--)
	            soma += numeros.charAt(10 - i) * i;
	        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	        if (resultado != digitos.charAt(0))
	            return false;
	        numeros = cpf.substring(0,10);
	        soma = 0;
	        for (i = 11; i > 1; i--)
	            soma += numeros.charAt(11 - i) * i;
	        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	        if (resultado != digitos.charAt(1))
	            return false;
	        return true;
	    }else
	        return false;
	}

    /**
    *	Função que abre janela modal com 1 e 2 botões
    * 	@parameter mixed titulo
    * 	@parameter mixed conteudoDaJanela texto/html/objJquery
    * 	@parameter mixed textoDoBotao (opcional)
    * 	@parameter mixed funcaoDoBotao (opcional)
    * 	@parameter mixed mensagemDeRodape (opcional)
    */
    divmodal = $('<div>').addClass('modal').attr('id','divmodal');
    function divmodalStart(titulo,recheio,buttonText,buttonOnclick,footerMessage){
        var cabecalho = $('<div>').addClass('modal-header').
            append(
                    $('<button>').addClass('close').attr('data-dismiss',"modal").attr('aria-hidden',"true").html("&times;")
                ).
            append(
                    $('<h3>').html(titulo)
                );
        var corpo = $('<div>').addClass('modal-body').html(recheio);

        var btn = '';
        if(buttonText && buttonOnclick){
            btn = $('<div>')
            .append('<a>').attr('onClick',buttonOnclick).addClass('btn btn-primary').html(buttonText)
        }

        var rodape = $('<div>').addClass('modal-footer')
            .append( $('<span>').attr('id','divfootermodalmessage').append(footerMessage) )
            .append( $('<button>').attr('data-dismiss',"modal").addClass('btn btn-defult').html('Fechar') )
            .append( btn );

        divmodal.html('').append(cabecalho).append(corpo).append(rodape).modal();
	}

	/**
    *	Função que fecha janela modal com 1 e 2 botões
    */
	function divmodalHide(){
        $('#divmodal').modal('hide');
		$('.modal').modal('hide');
	}

	/**
    *	Função que insere texto de rodapé na janela modal com 1 e 2 botões (requere res/modal.php)
    * 	@parameter mixed texto/html/objJquery
    */
	function divmodalMessage(txt){
		$('#divfootermodalmessage').html('').append(txt);
	}

	/**
    *	Função que corta os numeros finais de um float
    * 	@parameter mixed floatACortar
    * 	@parameter int quantidadeDeCasas
    * 	@returns mixed numeroTruncado
    */
	function truncaDeVerdade(flutuante, casas){
        s_a2 = flutuante.toString();
        arr_a2 = s_a2.split('.');
		if(!arr_a2[1]){arr_a2[1] = '0';}
        s_a2 = parseFloat(arr_a2[0]).toString()+'.'+arr_a2[1].substr(0,casas);
        a2 = parseFloat(s_a2);
        return a2;
    }

    /**
    *	Função que cria paginação
    * 	@parameter int paginaAtual
    * 	@parameter int quantidadeTotalDeRegistros
    * 	@parameter int quantidadeDeRegistrosPorPagina
    * 	@parameter mixed funcaoDeTrocaDePagina
    * 	@returns jQeryObject
    */
	function paginacaoJS(pagina,quantreg,registrosPorPagina,funcao){
		if(!pagina){pagina = 1;}
		var quantasPaginas = Math.ceil(quantreg / registrosPorPagina);
		var paginacao = $('<div/>').addClass('pagination pagination-mini');
		var ul = $('<ul/>');
		for(i=1; i<= quantasPaginas;i++){
			if( (i <= 5) || ((i >= pagina-5) && (i <= pagina+5)) || (i >= (quantasPaginas-5)) ){
				var a = $("<a/>").html(i).attr('onClick',funcao+"("+i+")");
				if(i == pagina){
					a.css('color','#ff0000');
				}
				ul.append( $('<li/>').append(a) );
			}
		}
		paginacao.append($('<hr/>'));
		paginacao.append(ul);
		paginacao.append($('<br/>'));
		paginacao.append("<i style='color:#aaaaaa'>"+quantreg+" registros</i>");
		return paginacao;
	}

	/**
    *	Função de expanção das funcoes de data
    */
	Date.prototype.today = function(){
	    return ((this.getDate() < 10)?"0":"") + this.getDate() +"/"+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +"/"+ this.getFullYear()
	};
	/**
    *	Função de expanção das funcoes de hora
    */
	Date.prototype.timeNow = function(){
	     return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
	};

	/**
    *	Função que retorna a hora atual (hh:mm)
    * 	@parameter bool true para segundos (:ss)
    * 	@returns mixed horaAtual
    */
	function getHora(full){
		d = new Date;
		if(full){
			return d.timeNow()
		}
		return d.timeNow().toString().substr(0,5);
	}
	/**
    *	Função que retorna o dia atual (dd/mm/aaaa)
    * 	@returns mixed dataAtual
    */
	function getDia(){
		d = new Date;
		return d.today();
	}

	/**
    *	Função que retorna data de objeto Date
    * 	@parameter obj Date()
    * 	@returns mixed data (dd/mm/aaaa)
    */
	function dataToStr(to){
		mes = to.getMonth()+1;
		return pad(to.getDate(),2)+'/'+pad(mes,2)+'/'+to.getFullYear();
	}

	/**
	*	Funcao transforma horas HH:MM em número inteiro para efetuar cálculos.
	* 	@parameter hora int
	*	@returns mixed hora HH:MM
	*/
	function hora2inteiro(hora){
		_arr = hora.split(':');
		if(_arr[1]>0){
			mins = _arr[1] / 60;
		}else{
			mins = 0;
		}
		_inteiro = parseFloat(_arr[0]) + mins;
		if( isNaN(_inteiro) ){
			_inteiro = 0;
		}
		return _inteiro;
	}

	/**
	*	Funcao transforma número inteiro em horas HH:MM.
	*	@parameter mixed HH:MM
	*	@returns float
	*/
	function inteiro2hora(inteiro){
		if(typeof(inteiro) == 'number' ){
			inteiro = inteiro.toString().replace('.',',');
		}
		_arr = inteiro.split(',');
		_min = parseFloat('0.'+_arr[1]) * 60;
		_min = _min.toFixed();
		_hora = pad(_arr[0],2)+':'+pad(_min,2);
		return _hora;
    }

    /**
    *   Funcao adiciona dias na data
    *   @parameter mixed DD/MM/AAAA
    *   @parameter int Quantidade dias
    *   @returns mixed DD/MM/AAAA
    */
    function addDias(dtBase,qDias){
        arr_dtBase = dtBase.split('/');
        if(arr_dtBase[0] && arr_dtBase[1] && arr_dtBase[2]){
            var from = new Date(arr_dtBase[2]+'-'+arr_dtBase[1]+'-'+arr_dtBase[0]+'T04:00:00');
            var to = new Date();
            to = from;
            to.setDate(from.getDate() + qDias);
            return dataToStr(to);
        }
        return '00/00/0000';
    }

    /**
    *   Funcao adiciona meses na data
    *   @parameter mixed DD/MM/AAAA
    *   @parameter int Quantidade meses
    *   @returns mixed DD/MM/AAAA
    */
    function addMes(dtBase,qMeses){
        arr_dtBase = dtBase.split('/');
        if(arr_dtBase[0] && arr_dtBase[1] && arr_dtBase[2]){
            dd = parseInt(arr_dtBase[0]);
            mm = parseInt(arr_dtBase[1]) + qMeses;
            if(mm>12 || mm<1 ){ //tratamento explosão
                tmp = parseInt(mm / 12);
                qAnos = tmp;
                aaaa = parseInt(arr_dtBase[2])+tmp;
                if(tmp<0){ tmp = tmp * -1; }
                mm = mm - (12*tmp);
            }else{
                aaaa = parseInt(arr_dtBase[2]);
            }
            return pad(dd,2)+'/'+pad(mm,2)+'/'+aaaa;
        }
        return '00/00/0000';
    }

    /**
    *   Funcao valida se a data existe
    *   @parameter mixed DD/MM/AAAA
    *   @returns boolean (true para data válida)
    */
    function validaData(dt){
        if(!dt) return false;
        arr = dt.split('/');

        dd = arr[0];
        mm = arr[1];
        aaaa = arr[2];

        if((dd<0 || dd > 31)) return false;
        if((mm<0 || mm > 12)) return false;
        if((aaaa<1900 || aaaa > 2100)) return false;

        arr31 = {1:true,3:true,5:true,7:true,8:true,10:true,12:31}

        if(!arr31[mm] && dd==31){return false;}
        if(mm==2 && dd > 29){return false;}

        return true;
    }

	/**
	*	Funcao preenche com zeros à esquerda o numero
	*	@parameter mixed numero
	*	@parameter int casas
	*	@returns mixed
	*/
	function pad(number, length) {
		var str = '' + number;
		while (str.length < length) {
    		str = '0' + str;
		}
		return str;
	}

    /**
    *	Funcao que limpa a tabela conservando a linha de cabeçalho
	*	@parameter mixed idTabela
    *   @parameter int quantidade de linhas a manter
    */
    function clearTable(tbName,num) {
    	tt = $('#'+tbName+' tr');
        x = '';
        if(!num) num = 1;
        for (var i = 0; i < num; i++) {
            x = x +'<tr>'+$(tt[i]).html()+'</tr>';
        };
        $('#'+tbName).html(x);

        if(num>1){$('input:text').setMask();}
    }

    /**
    * Função que evita que o usuário digite vírgula em campo numérico
    * @parameter this (usar no onkeyup)
    */
    function preventComa(obj){
        var cuRsoR = obj.selectionStart;
        obj.value = obj.value.replace(',','.');
        obj.setSelectionRange(cuRsoR,cuRsoR);
    }

    /**
    *	Funcao que apresenta mensagem de feedback na tela (requere jqueryToast)
	*	@parameter mixed
	*	@parameter mixed corDoAviso usar toast.types.{VERMELHO,AZUL,VERDE}
	*	@parameter mixed permanenciaDoAviso usar toast.sticky.{FICAR, APAGAR}
    */
    function mensagemDeCanto(message, type, keep){
        var options = {
            duration: 5001,
            sticky: keep,
            type: type
        };
        $.toast(message, options);
    }

	toast = new Object;
    toast.types = {VERMELHO:'danger',AZUL:'info',VERDE:'success'}
    toast.sticky = { FICAR:true, APAGAR:false}
    $(document).ready(function(){
		if($.toast){
			$.toast.config.align = 'center';
			$.toast.config.width = 400;
		}
    });

    /**
    * Função que impede a página de ser fechada quando algum campo do formulário é modificado
    * confirmação via browser api request
    */
    var canClose = true;
    function impedirFechamentoFormulario(){
        function myConfirmation() {
            if(!canClose) return 'Are you sure you want to quit?';
        }
        $('body').on('change','input, select, textarea', function(){ canClose = false; });
        window.onbeforeunload = myConfirmation;
    }
    /**/

    /**
    * Função impede que formulário seja submetido quando bate enter
    *
    */
    function trocaEnterPorTab(){
        $('body').on('keydown', 'input, select, textarea', function(e) {
                var self = $(this)
                , form = self.parents('form:eq(0)')
                , focusable
                , next
                , prev
                ;

                if (e.shiftKey) {
                    if (e.keyCode == 13) {
                        focusable =   form.find('input,a,select,button,textarea').filter(':visible');
                        prev = focusable.eq(focusable.index(this)-1);

                        if (prev.length) {
                            prev.focus();
                        } else {
                            form.submit();
                        }
                    }
                }
                else
                    if (e.keyCode == 13) {
                        focusable = form.find('input,a,select,button,textarea').filter(':visible');
                        next = focusable.eq(focusable.index(this)+1);
                        if (next.length) {
                            next.focus();
                        } else {
                          //  form.submit();
                        }
                        return false;
                    }
                });
    }
    /**/

    function somenteNumeros(a){
        b = a.replace(/[^\d]/g,'');
        return b;
    }


/* Inicialização de bibliotecas de másca de campo e escolha de data*/
(function($){
    $(function(){
        $('input:text').setMask();
        //if($('.date-pick')[0]){ $('.date-pick').datepicker({ dateFormat: 'dd/mm/yy' }); }
        $.ajaxSetup({ cache: false });
    });
})(jQuery);
