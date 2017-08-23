<?php
    class mydatabase{

    var $usuario = DB_USER;
    var $senha = DB_PW;
    var $servidor = DB_SERVER;
    var $database = 'portaria';
    var $con;

    private static $instance;

    private function  __construct(){
            try{
                if(!$this->con = mysql_connect($this->servidor,$this->usuario,$this->senha)){
                    $e = mysql_error();
                    trigger_error("Erro ao conectar ao servidor usando a extensão MYSQL - " . $e['message'], E_USER_WARNING);
                }else{
                    if(!mysql_select_db($this->database)){
                        $e = mysql_error();
                        trigger_error("Erro ao selecionar o banco de dados - " . $e['message'], E_USER_WARNING);
                    }
                }
            }catch (Exception $e1){
                trigger_error($e1->getMessage(), E_USER_WARNING);
            }
    }

    public static function singleton(){
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

    public function getCon(){ return $this->con; }

    public function query($param){
        $sql = mysql_query($param, $this->con);
        if(!$sql){
            print_r(mysql_error());
            die;
        }

        return $sql;
    }

    public function getQuantReg($param){
        $parampg = "SELECT count(*) AS NUMERO FROM ($param) TC";

        $sql_pg = $this->query($parampg);
        $rw = mysql_fetch_assoc($sql_pg);
        return intval($rw["NUMERO"]);
    }

    public function paginado($param, $inicial, $final){
        $lim = intval($final - $inicial);
        if($lim < 1) $lim = 30;

        $reparam = "SELECT *  FROM (
                        $param
                    ) PAGINATED
                    LIMIT $lim OFFSET $inicial";
        return $this->query($reparam);
    }

}
    $db = mydatabase::singleton();