/* lista de checkins */
var count = 0;
function sendCheckin(){
    $('#imgwait').show();

    nome = $("#nome").val();
    telefone = $("#telefone").val();
    cracha = $("#cracha").val();

    $.post('pessoa/checkin.php',{
        nome:nome,
        telefone:telefone,
        cracha: cracha
    },function (res) {
        if(res=='OK'){
            $('#imgwait').hide();
            addItemToTable(nome,telefone,cracha);
            limparCampos();
            $('#nome')[0].focus();
        }else{
            launchWarning('Deu erro','vermelho');
        }
    });
}

function addItemToTable(a,b,c){
    count++;
    addItemDo(count,a,b,c,getHora(),null);
}

function limparCampos(){
    $("#nome").val('');
    $("#telefone").val('');
    $("#cracha").val('');
}

function addItemDo(co,a,b,c,d,e){
    if(e){
        classe = 'disabled';
        d = d+'/'+e;
    }else{
        classe = '';
    }

    $('#tbcheckin')
    .prepend($('<tr>').addClass(classe)
        .append(
            $('<td>').html(co)
        )
        .append(
            $('<td>').html(a)
        )
        .append(
            $('<td>').html(b)
        )
        .append(
            $('<td>').html(c)
        )
        .append(
            $('<td>').html(d)
        )
    );

    $('#tbcheckin').prepend($('#tr2')).prepend($('#tr1'));
}

function getOlds(){
    $.get('pessoa/getCheckins.php',function(res){
        aguarde();
        $.each(res,function(i,itm){
            addItemDo(i, itm.NOME, itm.TELEFONE, itm.CRACHA, itm.INTM, itm.OUTTM);
            count = i;
        });
        divmodalHide();
        $('#nome')[0].focus();
    },'json');
}

function aguarde(titulo,recheio){
    var container = $('<div>').addClass('modal').attr('id','avisoOKModal');
    var corpo = $('<div>').addClass('modal-body')
        .append(
            $('<h1>').html('Aguarde ').append( $('<i>').addClass('fa fa-refresh fa-spin fa-5x') )
        ).append('estou carregando os que já entraram');
    container.append(corpo);
    container.modal();
}
/**/

/* Lista suspensa de nomes */
listaSuspensa = [];
function getNomes(b){
    $.get('pessoa/busca_pessoa.php',{
        busca:b
    },function(res){
        listaSuspensa = res;
        $('#dvListaSuspensa').html('');
        $.each(res,function(i,itm){
            $('#dvListaSuspensa')
            .append(
                $('<div>')
                .append($('<b>').html(itm.ID).addClass('bblock') )
                .append($('<span>').append(itm.NOME).append("<br>").append(itm.TELEFONE) )
                .attr('onClick','suspClick('+i+')')
            );
        });
        idx_nomes = -1;
    },'json');
}

function suspClick(i){
    obj = listaSuspensa[i];
    $("#nome").val(obj.NOME);
    $("#telefone").val(obj.TELEFONE);
    $('#dvListaSuspensa').html('');
    $("#cracha")[0].focus();
    idx_nomes = -1;
}

var idx_nomes = -1;
function nomeKeyup(e){
    if (e.keyCode == 13) {
        if(idx_nomes >= 0){
            suspClick(idx_nomes);
        }else{
            $('#telefone')[0].focus();
        }
    }else if (e.keyCode == 39 || e.keyCode == 37){ //39 right//37 left
        if(idx_nomes >= 0){
            suspClick(idx_nomes);
        }
    }else if(e.keyCode == 38){ //38 up
        idx_nomes--;
        if(idx_nomes<0){
            idx_nomes = listaSuspensa.length-1;
        }
        animateNome();
    }else if(e.keyCode == 40){ //down
        idx_nomes++;
        if(idx_nomes > listaSuspensa.length-1){
            idx_nomes = 0;
        }
        animateNome();
    }else{
        busca = $("#nome").val();
        if(busca.length >2){
            getNomes(busca);
        }
    }
}

function animateNome(){
    listinha = $('#dvListaSuspensa div');
    listinha.css('background','inherit').css('color','inherit');
    $(listinha[idx_nomes]).css('background','#aaaaaa').css('color','#aaFFdd');
}
/**/

/* check out */
function showCheckout(){

    recheio = $('<div>')
        .append( $('<input type="text">').attr('id','iptCheckout') )

    divmodalStart('Check Out',recheio);
    $('#iptCheckout')[0].focus();

    $("#iptCheckout").keyup(function (e) {
        if (e.keyCode == 13) {
            $.post('pessoa/checkout.php',{
                cracha: $('#iptCheckout').val()
            },function(res){
                if(res=='OK'){
                    mensagemDeCanto('Check Out OK!',toast.types.VERDE,toast.sticky.APAGAR);
                }else{
                    mensagemDeCanto(res,toast.types.VERMELHO,toast.sticky.APAGAR);
                }
                $('#iptCheckout').val('');
                $('#iptCheckout')[0].focus();
            });
        }
    });
}