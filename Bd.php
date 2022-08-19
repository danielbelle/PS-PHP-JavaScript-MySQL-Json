<?php
require_once('script.php');

/* Conecta ao banco de dados */
$comunicadorBd = new Bd();
$comunicadorBd->Conectar('localhost','teste_rte','root','123456');
class Bd 
{
    private $host;
    private $database; 
    private $user;
    private $password;   
    private $con;
    private $json;

    public function Conectar($host, $database, $user, $password){
        $this->host = $host;
        $this->database = $database; 
        $this->user = $user;
        $this->password = $password;
        $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8";
        
        try{
            $this->con = new PDO($dsn, $this->user, $this->password);
            /*echo "<script>alert('Conectado com sucesso ao {$this->database}.')</script>";*/
        }catch (PDOException $ex){
            echo 'Erro: '.$ex->getMessage();
        }
        return $this->con;

    }

    public function Gravar($json){
        $this->json=$json;
        
        $statements = [
            file_get_contents("sql-scripts/textareajson.sql"),
            "INSERT INTO `textareajson` VALUES('$json');" ,
            file_get_contents("sql-scripts/send-to-mysql.sql")
        ];
        
        foreach($statements as $stm){
            $sql = $this->con->prepare($stm);
            $sql->execute();
        }
        


    }

    public function Ler(){

        $statements = [ 
            file_get_contents("sql-scripts/recive-from-mysql.sql"),
            'SELECT * FROM `jsonsainda`;'

        ];

        foreach($statements as $stm){
            $sql = $this->con->prepare($stm);
            $sql->execute();
            $resultado = $sql->fetchAll();
        }

        print_r($resultado[0][0]);

        file_put_contents("textarea.json",$resultado[0][0]);
        
        $sql3 = $this->con->prepare("DROP TABLE IF EXISTS jsonsainda");
        $sql3->execute();
        
    }
    
}
?>