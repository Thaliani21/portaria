function abrirJanelaBusca(){
    var div = $('<div/>')
        .attr('id','dvResBusca')
        .css('text-align','left')
        .append(
            $('<div>').addClass('input-append')
            .append( $('<input>').attr('type','text').attr('id','busca').attr('placeholder','Nome/Matr.').attr('autocomplete','off') )
            .append( $('<span>').addClass('add-on')
                .append(
                    $('<i>').addClass('icon-search').attr('onClick','pesquisa()')
                )
            )
        )
        .append('<br>');
        divmodalStart("Busca",div);
        $("#busca").keyup(function (e) { if (e.keyCode == 13) { pesquisa();}});
}

var arr_funcs=[];
function pesquisa(){
    var busca = $('#busca').val();
    $.get('/GPLM/res/busca_pessoa.php',{
        busca:busca
    }, function(result) {
        arr_funcs = result;
        if(!result){
            $('#dvResBusca').html('Nenhum resultado');
        }else{
            $.each(result,function(ind,item){
                $('#dvResBusca').append(
                    $('<a/>').html(item.MATRICULA+' - '+item.NOME)
                    .attr('onclick','setD('+ind+')')
                ).append($('<br>'));
            });
        }
    },'json');
}

function setD(i){
    fun = arr_funcs[i];
    $('#mat').val(fun.MATRICULA);
    $('#spnome').html(fun.NOME);
    $('#setor').val(fun.SETOR);
    $('#funcao').val(fun.FUNCAO);
    $('.modal').modal('hide');
}