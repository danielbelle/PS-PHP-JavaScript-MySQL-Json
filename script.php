<?php
$dadosObj = new stdClass();
$dadosObj->pessoas = [];
$info_pessoas = new stdClass();  
 
if(isset($_POST["nome-pessoa-adicionado"])){

    $info_pessoas->nome=$_POST['entrada'];
    $info_pessoas->filhos = [];
    $dadosObj->pessoas = [$info_pessoas];

    if(filesize("textarea.json") != 0 ){
        /*$dado_antigo = new stdClass();*/
        $dado_antigo = json_decode(file_get_contents("textarea.json"));
        $dado_pessoas = [];
        foreach ($dado_antigo->pessoas as $dp) {
            $dado_pessoas[] = $dp;
        }
        $dado_pessoas[] = $info_pessoas;
        $dadosObj->pessoas = $dado_pessoas;

    }/*FAZER UM PRIMEIRA VEZ QUE APAGA TUDO */ 

    if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
        /*echo "Erro ao salvar dado, tente novamente";*/
    }else{
        /*echo "Dado adicionado";*/
    }
}

?>