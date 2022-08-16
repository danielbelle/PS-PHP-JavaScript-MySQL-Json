<?php
$dadosObj = new stdClass();
$dadosObj->pessoas = [];
$info_pessoas = new stdClass();  

 
/* Função para pai */
if(isset($_POST["nome-pessoa-adicionado"])){
    header('Refresh:0a');
    $info_pessoas->nome=$_POST['entrada'];
    $info_pessoas->filhos = [];
    $dadosObj->pessoas = [$info_pessoas];

    if(filesize("textarea.json") == 0 ){
        $dadosObj = $dadosObj;

    }/*FAZER UM PRIMEIRA VEZ QUE APAGA TUDO */ 
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
    }else{
        //echo "Dado adicionado";
    }
}

/* Função para filho */
if(isset($_POST["novo-filho"])){
    header('Refresh:0');
    //prompt função
    function prompt(){
        echo("<script> var nome = prompt('Informe o nome'); </script>");
        $nome = "<script> document.write(nome); </script>";
        return($nome);
    }
    //programa
    //$nome = prompt();
    /*echo("<script> const div_info = document.querySelector('.btn-add-filho') </script>")*/

    /*$info_pessoas->filhos = [];

    $dado_antigo = new stdClass();
    $dado_antigo = json_decode(file_get_contents("textarea.json"));
    $dado_pessoas = [];
    
    
    foreach ($dado_antigo->pessoas as $dp) {
        $dado_pessoas[] = $dp;
    }*/

    /*$dado_pessoas[] = $info_pessoas;
    $dadosObj->pessoas = $dado_pessoas;

    if(!file_put_contents("textarea.json", json_encode($dadosObj, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE |  JSON_UNESCAPED_SLASHES))){
     
    }else{
    }*/
}

?>