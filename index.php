<?php
require_once('Bd.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="estilos.css">
    <title>Teste Turim</title>
</head>
<body>
    <form method="POST" role="form">
        <div class="container-cadastro">       
            <div class="bd-enviar-receber">
                <button>Gravar</button>
                <button>Ler</button>
            </div>
            <div class="container-entrada-nome"> 
                <label for="entrada">Nome:</label>
                <input type="text" name="entrada" id="entrada">
                <input type="submit" name="nome-pessoa-adicionado" value="Incluir"></input>
            
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
                                    <button class="btn-remover-filho delete-filho" data-id="<?php echo $key2_filho ?>>Remover Filho</button>
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

    </form>
    <div class="container-json">
        
        <textarea class="text-area" id="text-area"><?php 
            $data = file_get_contents("textarea.json");
            
            print_r($data)?>
        </textarea>
        
    </div>
</body>
</html>

<script>
$(document).ready(function(){
    $(document).on('click', '.delete', function(){

        var id = $(this).data('id');
        console.log("id é :" +id);
        $.ajax({
            url:"script.php",
            method:"POST",
            data:{action:'delete', id:id},
            dataType:"text",
            success:function(data)
            {
                const elemento = document.getElementById('cardEsq' + id);
                elemento.remove();
                const printar_dados = document.querySelector(".container-json");
                /*var php = "<?php $data = file_get_contents("textarea.json"); print_r($data)?>";
                printar_dados.innerHTML = '<textarea class="text-area">'+ php +'</textarea>';
                */
                window.location.reload();
            }
        });
        

    });
});
</script>