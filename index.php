<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                <button>incluir</button>
            </div>
        </div>

        <div>
            <h3 class="titulo">Pessoas</h3>
            <div class="container-escondido">
                <div class="container-saida-pai">
                    <div class="container-nome-pai">
                        <label class="nome-Pai">NomePai</label>
                    </div>
                    <div class="container-botao-pai">
                        <button class="button-remover-pai">Remover</button>
                    </div>
                </div>
                <div class="container-saida-filho">
                    <div class="container-nome-filho">
                        <label class="nome-filho">FilhoN</label>
                    </div>
                    <div class="container-botao-filho">
                        <button class="button-remover-filho">Remover Filho</button>
                    </div>
                </div>
                <div class="container-botao-add-filho">
                    <button>Adicionar Filho</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-json">
        <textarea class="text-area"></textarea>
    </div>

    
</body>
</html>


