<?php
$dadosObj = new stdClass();
$dadosObj->pessoas = [];
$info_pessoas = new stdClass();  

 
/* Função para pai */
if(isset($_POST["nome-pessoa-adicionado"])){
    header('Refresh:0');

    $info_pessoas->nome=$_POST['entrada'];
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
        print_r($dadosObj);
        if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
            //echo "Erro ao salvar dado, tente novamente";
        }
        
        
    }

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
        print_r($dadosObj);
        if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
            //echo "Erro ao salvar dado, tente novamente";
        }
        
        
    }



}


?>