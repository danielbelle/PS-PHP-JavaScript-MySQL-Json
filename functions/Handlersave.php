<?php



class Handler
{
    
    public static function arrayHandler($dadosObj,$pessoas)
    {
        
        if(isset($_POST["nome-pessoa-adicionado"])){

            $pessoas->nome=$_POST['entrada'];
            $pessoas->filhos = [];
            
            $dadosObj->pessoas = [$pessoas,$pessoas,$pessoas];
        
        
        }

        $json = json_encode($dadosObj, JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES);
        
        //if(count((array)$pessoas) == 1){
            print_r(sizeof((array)$json));
        //}
        
        $lastError = json_last_error();

        if($lastError == 0 ){
    
            print_r($json);
    
        }else{
            return ("Erro n°:{$lastError}");
    
        }    
    }
}



?>