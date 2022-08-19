<?php

require_once('bd.php');

$dadosObj = new stdClass();
$dadosObj->pessoas = [];
$info_pessoas = new stdClass();  

 
/* Função para pai */
if(isset($_POST['action'])){
    if($_POST['action'] == 'pessoa-adicionada') {
        header('Refresh:0');

        $info_pessoas->nome=$_POST['input'];
        $info_pessoas->filhos = [];
        $dadosObj->pessoas = [$info_pessoas];

        if(filesize("textarea.json") == 0 ){
            $dadosObj = $dadosObj;
        }
        /*FAZER UM PRIMEIRA VEZ QUE APAGA TUDO */ 
        else{
            $dado_antigo = new stdClass();
            $dado_antigo = json_decode(file_get_contents("textarea.json"));
            $dado_pessoas = [];
            foreach ($dado_antigo->pessoas as $dp) {
                $dado_pessoas[] = $dp;
            }
            $dado_pessoas[] = $info_pessoas;
            $dadosObj->pessoas = $dado_pessoas;
        }

        if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
            //echo "Erro ao salvar dado, tente novamente";
        }
    }
}

/* Deletar pai */
if(isset($_POST['action'])){
    if($_POST['action'] == 'delete') {
        header('Refresh:0');
            
        $key = $_POST['id'];

        $dadosObj->pessoas = [];
        $info_pessoas = new stdClass(); 
        $dadosObj->pessoas = [$info_pessoas]; 

        $dado_antigo = new stdClass();
        $dado_antigo = json_decode(file_get_contents("textarea.json"));
        $dado_pessoas = [];
        //echo("key é: $key ");
        //print_r($dado_antigo->pessoas[$key]);
        //unset($dado_antigo->pessoas[$key]);
        

        foreach ($dado_antigo->pessoas as $keydp=>$dp) {
            
            if($key != $keydp){
                //print_r($key);
                //print_r($keydp);
                //print_r($dp);
                $dado_pessoas[] = $dp;
            }
        }
        $dadosObj->pessoas = $dado_pessoas;
        //print_r($dadosObj);
        if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
            //echo "Erro ao salvar dado, tente novamente";
        }
    }
}

if(isset($_POST['action'])){
    if($_POST['action'] == 'del-filho') {
        header('Refresh:0');
        
        $key_filho = $_POST['id_filho'];
        $key_pai = $_POST['id_pai'];

        $dadosObj->pessoas = [];
        $info_pessoas = new stdClass(); 
        $dadosObj->pessoas = [$info_pessoas]; 
        $dado_filhos = [];

        $dado_antigo = new stdClass();
        $dado_antigo = json_decode(file_get_contents("textarea.json"));

        //echo("k pai = $key_pai ");
        //echo("k filho = $key_filho ");

        array_splice($dado_antigo->pessoas[$key_pai]->filhos, $key_filho,1);

        $dadosObj = $dado_antigo;
        if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
        }
        
        
    }
}

if(isset($_POST['action'])){
    if($_POST['action'] == 'novo-filho') {
        header('Refresh:0');
        
        $key_pai = $_POST['id_pai'];
        $novo_filho = $_POST['nome'];

        $dadosObj->pessoas = [];
        $info_pessoas = new stdClass(); 
        $dadosObj->pessoas = [$info_pessoas]; 

        $dado_antigo = new stdClass();
        $dado_antigo = json_decode(file_get_contents("textarea.json"));

        //unset($dado_antigo->pessoas[$key_pai]->filhos[$key_filho]);

        array_push($dado_antigo->pessoas[$key_pai]->filhos, $novo_filho);

        
        $dadosObj = $dado_antigo;
        
        if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
        }
        
        
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'gravar-bd')  {
        header('Refresh:0');
        
        $comunicadorBd->Gravar(file_get_contents("textarea.json"));
        }

    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'ler-bd')  {
        header('Refresh:0');

        $comunicadorBd->Ler();

        }

    }



}

?>