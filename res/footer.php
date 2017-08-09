</div>
<style>
    #footer_content {margin:0 auto;border-top:#AAA 1px dashed;padding:0px;width:650px;height:30px;}
    #footer_texto {height: 28px;padding-top: 2px;font-size: 10px;color: #666;}
</style>
<div id="footer_content">
    <div id="footer_texto">
        PIB - Primeira Igreja Batista de Curitiba
    </div>
</div>
<?php
    if($_SESSION['mensagem']){
        $aviso1 = $_SESSION['mensagem'];
        echo "<script>geraAvisoOKModal('Aviso!','$aviso1')</script>";
        unset($_SESSION['mensagem']);
    }
?>
</body>
</html>