<?php

require_once('Bd.php');
require_once('script.php');

/* Conecta ao banco de dados */
$comunicadorBd = new Bd();
$comunicadorBd->Conectar('localhost','teste_rte','root','');

$comunicadorBd->Ler();


?>

<script>

var nome_filho_add;

    function removeCard(index){
        
        
        
        
        var elemento = document.getElementById('cardEsq' + index);
        elemento.remove();

    }

    function removeFilho(id){
        var elemento = document.getElementById(id);
        elemento.remove();
    }

    function adicionarFilho(){
        
        nome = prompt("Informe o nome");
        return console.log(nome);
    }


</script>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
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
        
        <div class="titulo">
            <h3>Pessoas</h3>
        </div>
        <div class="">

        <?php
        $json_data = file_get_contents("textarea.json");
        $infos = json_decode($json_data);
        
        if(!empty($infos)){
            foreach($infos->pessoas as $key=>$info){
                ?>
                <div class="card-esquerdo" id="cardEsq<?php echo $key ?>">
                    <div class="card-pai">
                        <div class="div-nome-pai">
                            <label class="nome-Pai"><?php echo $info->nome ?></label>
                        </div>
                        <div class="div-btn-pai">
                            <button class="btn-remover-pai" onclick="removeCard(<?php echo $key ?>)">Remover</button>
                        </div>
                    </div>
                    <!-- VARIAVEL FILHOS SOME  TENHO QUE ALTERAR A KEY-->
                    <div class="filhos">
                        <?php
                                
                        foreach($info->filhos as $key2_filho=>$info_filho){
                                ?>
                        <div class="card-filhos" id="cardFilho<?php echo $key; echo $key2_filho ?>">
                        
                          <div class="separador-filho" >
                                <div class="div-nome-filho">
                                    <label class="nome-filho">- <?php echo $info_filho?></label>
                                </div>
                                <div class="div-btn-filho">
                                    <button class="btn-remover-filho" onclick="removeFilho('cardFilho<?php echo $key; echo $key2_filho ?>')">Remover Filho</button>
                                </div>
                            </div>
                            
                        
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                    <div class="btn-add-filho" name="filho-add">
                        <input type="submit" value="Adicionar Filho" name="novo-filho" key="<?php echo $key ?>" onclick="adicionarFilho()"></input>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        </div>
    </div>
    <div class="container-json">
        
        <textarea class="text-area"><?php 
            $data = file_get_contents("textarea.json");
            
            print_r($data)
        
        ?></textarea>
        
    </div>

    
</body>
</html>