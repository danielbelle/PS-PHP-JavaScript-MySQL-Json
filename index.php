<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src=handler.js></script>
    <link rel="stylesheet" href="style.css">
    <title>Teste Turim</title>
</head>
<body>
    <form method="POST" role="form">
        <div class="container-cadastro">       
            <div class="bd-enviar-receber">
                <button type="button" name="gravar-bd" class="gravar-bd">Gravar</button>
                <button type="button" name="ler-bd"
                class="ler-bd">Ler</button>
            </div>
            <div class="container-entrada-nome"> 
                <label for="entrada">Nome:</label>
                <input type="text" name="entrada" id="entrada">
                <button type="button" name="pessoa-adicionada" class="pessoa-adicionada">Incluir</button>
            
            </div>
        
            
        
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
                            <button type="button" class="btn-remover-pai delete" data-id="<?php echo $key ?>">Remover</button>
                        </div>
                    </div>
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
                                    <button type="button" class="btn-remover-filho del-filho" data-id="<?php echo $key2_filho ?>" data-pai="<?php echo $key ?>" >Remover Filho</button>
                                </div>
                            </div>
                        </div> 
                        <?php 
                        } 
                        ?>
                    </div>
                    <div class="btn-add-filho" name="filho-add">
                        <button type="button" class="novo-filho" data-pai="<?php echo $key ?>">Adicionar Filho</button>
                    </div>
                </div> 
                <?php 
                } 
                }
                ?>
            </div>
        </div>
    </form>
    <div class="container-json">
        <textarea class="text-area" id="text-area"><?php 
            $data = file_get_contents("textarea.json");
            print_r($data)?>
        </textarea>
    </div>
</body>
</html>
