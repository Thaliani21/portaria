<?php
	require_once ($_SERVER['DOCUMENT_ROOT']."/portaria/variaveis.php");
	require_once (RES.'head.php');

    ?>
    <h4>Portaria - Check-in</h4>

    <script src='<?php echo JS ;?>checkin.js' type='text/javascript'></script>
    <table id='tbcheckin' class='table table-striped table-hover'>
        <tr id='tr1'>
            <td></td>
            <td>
                <input type='text' id='nome' autocomplete='off'>
                <div id='dvListaSuspensa'></div>
            </td>
            <td><input type='text' id='telefone'></td>
            <td>
                <input type='text' id='cracha'>
                <i class='fa fa-refresh fa-spin' style='display:none' id='imgwait'></i>
            </td>
            <td></td>
        </tr>
        <tr id='tr2'>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Crachá</th>
            <th>Hora</th>
        </tr>
    </table>


    <script>
        $("#nome").keyup(function (e) {nomeKeyup(e);});

        $("#telefone").keyup(function (e) { if (e.keyCode == 13) {
            $('#cracha')[0].focus();
        }});

        $("#cracha").keyup(function (e) { if (e.keyCode == 13) { sendCheckin();}});

        $('#nome')[0].focus();

        getOlds();

        $('#dvListaSuspensa').css('width',$('#nome').css('width'));
    </script>

    <style type="text/css">
        #dvListaSuspensa{
            position: absolute;
            border: 1px solid;
            background: #efefef;
        }
        .bblock{
            display:table;
            width: 20px;
            float: right;
            font-size: 22px;
            margin-top: 5px;
        }

        #dvListaSuspensa span{
            padding-left: 5px;
            color: #000;
        }

        #dvListaSuspensa div{
            cursor: pointer;
        }

        #dvListaSuspensa div:hover{
            background: #aaaaaa ;
            color: #aaFFdd;
        }

    </style>
<?php require_once(RES."footer.php");
