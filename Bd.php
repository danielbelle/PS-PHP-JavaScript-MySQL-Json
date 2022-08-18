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
        $sql = $this->con->prepare("SELECT * FROM pessoa");
        $sql->execute();
        
        $fetchPessoa = $sql->fetchAll();

        /*foreach ($fetchPessoa as $key => $value) {
            echo "{$value['id']} | {$value['nome']}";
            echo '<hr>';
        }*/
    }
    
}
?>