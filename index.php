<?php

require_once('bd/Bd.php');
require_once('script.php');



/* Conecta ao banco de dados */
$comunicadorBd = new Bd();
$comunicadorBd->Conectar('localhost','teste_rte','root','');

$comunicadorBd->Ler();


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
               
        <form method="POST" role="form" action="">
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
        
        <textarea class="text-area"><?php 
            $data = file_get_contents("textarea.json");
            
            print_r($data)
        
        ?></textarea>
        
    </div>

    
</body>
</html>