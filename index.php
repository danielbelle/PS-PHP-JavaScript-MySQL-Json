<?php

require_once('bd/Bd.php');
require_once('functions/Handler.php');




/* Conecta ao banco de dados */
$comunicadorBd = new Bd();
$comunicadorBd->Conectar('localhost','teste_rte','root','');

$comunicadorBd->Ler();


/*  tem que iniciar assim  */
$dadosObj = new stdClass();
$dadosObj->pessoas = [];
$pessoas = new stdClass();



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
               
        <form method="POST" role="form">
            <button>Gravar</button>
            <button>Ler</button>
            <div class="container-entrada-nome"> 
                <label for="entrada">Nome:</label>
                <input type="text" name="entrada" id="entrada">
                <input type="submit" name="nome-pessoa-adicionado" value="Incluir"></input>
            
            </div>
        </form>
        
        <h3 class="titulo">Pessoas</h3>

        <!-- AQUI VEM O CARD DO PAI E FILHO -->
    </div>
    <div class="container-json">
        
        <textarea class="text-area" ><?php Handler::arrayHandler($dadosObj,$pessoas);?></textarea>
        
    </div>

    
</body>
</html>