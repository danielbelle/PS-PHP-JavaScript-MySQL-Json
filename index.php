<?php
    require_once('bd/conexao.php');
    require_once('functions/handler.php');


    



    /* Conecta ao banco de dados */
    $comunicadorBd = new Bd();
    $comunicadorBd->Conectar('localhost','teste_rte','root','');
    
    $comunicadorBd->Ler();


    $array = [
        'pessoas' => [
            'nome' => 'João',
            'filhos' =>[
                'Gustavo',
                'Victor'
            ]
        ]

    ];


    function arrayToJson($array){

        $json = json_encode($array, JSON_PRETTY_PRINT | 
        JSON_UNESCAPED_UNICODE | 
        JSON_UNESCAPED_SLASHES );

        $lastError = json_last_error();

        if($lastError == 0 ){

            echo $json;

        }else{
            echo "Erro n°:{$lastError}";
        }
        
        
        /* PARA DECODAR
        $decode = json_decode($json);*/
    }



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Teste Turim</title>
</head>
<body>
    <div class="container-cadastro">
        <div>
            <button>Gravar</button>
            <button>Ler</button>
            <div class="container-entrada-nome">
                <label>Nome:</label>
                <input type="text" />
                <button name="novo-nome-adicionado">Incluir</button>
            </div>
        </div>
        
        <h3 class="titulo">Pessoas</h3>

        <!-- AQUI VEM O CARD DO PAI E FILHO -->
    </div>
    <div class="container-json">
        
        <textarea class="text-area" ><?php arrayToJson($array); ?></textarea>
        
    </div>

    
</body>
</html>