<?php
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
        $jsonArray = json_decode($this->json, JSON_OBJECT_AS_ARRAY);
        echo('<pre>');
        print_r($jsonArray);
        echo('<pre>');



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