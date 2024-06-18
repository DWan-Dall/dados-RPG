<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados RPG</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="/PROJETOS-DIO/Dados-RPG/Imagens/icon.png">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .dado-img {
            cursor: pointer;
            margin: 5px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease-in-out;
            /* max-width: 100%;
            height: auto; */
        }
        .dado-img:hover {
            transform: scale(1.05);
        }
        #dados-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
        }
        .modal-dialog {
            max-width: 400px;
        }
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .modal-body {
            text-align: center;
        }
        /* .btn-custom {
            font-size: 18px;
            margin-bottom: 10px; */
        /* } */
        .jogadas-container {
            text-align: center;
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            /* display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.2rem; */
        }
        .jogadas-icon {
            /* font-size: 24px;
            margin-right: 10px;
            color: #007bff; */
            margin-right: 10px;
        }
        .jogadas-label {
            /* font-size: 18px; */
            font-weight: bold;
        }
        .btn-group-top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn-group-top .btn {
            width: calc(33.33% - 5px);
        }
    </style>
</head>
<body>
  <div class="container">
    <div class="text-center">
      <h1>Dados RPG</h1>
      <p class="lead">Faça jogadas e divirta-se!</p>
      <hr>
    </div>
        
    <div class="jogadas-container">
        <span class="jogadas-label">Quantidade de Jogadas:</span>
        <span id="jogadas" class="font-weight-bold">0</span>
    </div>

    <div id="dados-container">
        <img src="/PROJETOS-DIO/Dados-RPG/Imagens/4.JPG" class="dado-img" data-dado="4">
        <img src="/PROJETOS-DIO/Dados-RPG/Imagens/6.JPG" class="dado-img" data-dado="6">
        <img src="/PROJETOS-DIO/Dados-RPG/Imagens/8.JPG" class="dado-img" data-dado="8">
        <img src="/PROJETOS-DIO/Dados-RPG/Imagens/10.JPG" class="dado-img" data-dado="10">
        <img src="/PROJETOS-DIO/Dados-RPG/Imagens/12.JPG" class="dado-img" data-dado="12">
        <img src="/PROJETOS-DIO/Dados-RPG/Imagens/20.JPG" class="dado-img" data-dado="20">
        <img src="/PROJETOS-DIO/Dados-RPG/Imagens/100.JPG" class="dado-img" data-dado="100">
    </div>
    
    <div class="btn-group-top">
        <button type="button" class="btn btn-info" id="jogada-combinada">
          <i class="fas fa-handshake"></i> Jogada combinada
        </button>
        <div>
        <button type="button" class="btn btn-success" id="adicionar-dado">
            <i class="fas fa-plus"></i> Add Dado
        </button>
        <button type="button" class="btn btn-warning" id="editar-dado">
            <i class="fas fa-pencil-alt"></i> Editar Dado
        </button>
        <button type="button" class="btn btn-danger" id="excluir-dado">
            <i class="fas fa-trash-alt"></i> Excluir Dado
        </button>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Resultado:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="dado-selecionado"></p>
                    <p id="resultado"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="jogar-novamente" style="display: none;">
                      <i class="fas fa-dice"></i> Jogar novamente!
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                      <i class="fas fa-times"></i> Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script> <!-- Biblioteca para áudio -->
  <script>
        var sound = new Howl({
            src: ['/PROJETOS-DIO/Dados-RPG/Sons/dado-rolando.mp3']
        });

        function jogarDado(dado) {
            sound.play();
            $.ajax({
                url: 'dados.php',
                type: 'GET',
                data: { dado: dado },
                dataType: 'json',
                success: function(response) {
                  var resultado = response.message.includes('CRÍTICO!') ? 
                        '<div class="alert alert-success">' + response.message + '</div>' : 
                        '<div class="alert alert-info">' + response.message + '</div>';

                    $('#resultado').html(resultado);
                    $('#dado-selecionado').text('Dado selecionado: D' + dado);
                    $('#jogar-novamente').toggle(response.message.includes('CRÍTICO!'));
                    $('#myModal').modal('show');

                    // $('#resultado').text(response.message);
                    // $('#dado-selecionado').text('Dado selecionado: D' + dado);
                    // $('#jogar-novamente').toggle(response.message.includes('CRÍTICO!'));
                    // $('#myModal').modal('show');

                    // Conta as jogadas
                    var jogadas = parseInt($('#jogadas').text()) + 1;
                    $('#jogadas').text(jogadas);
                },
                error: function(xhr, status, error) {
                    $('#resultado').html('<div class="alert alert-danger">Erro ao lançar o dado: ' + xhr.responseText + '</div>');
                    $('#myModal').modal('show');
                }
            });
        }

        $(document).ready(function() {
            $('.dado-img').click(function() {
                var dado = $(this).data('dado');
                jogarDado(dado);
            });

            $('#adicionar-dado').click(function() {
                var newDadoValue = prompt("Digite o valor do novo dado:");
                if (newDadoValue && !isNaN(newDadoValue)) {
                    var existingDado = $('.dado-img[data-dado="' + newDadoValue + '"]');
                    if (existingDado.length > 0) {
                        alert("Esse valor de dado já existe! Escolha outro valor.");
                    } else {
                        var newDadoImg = prompt("Digite a URL da imagem do novo dado:");
                        if (newDadoImg) {
                            $('#dados-container').append('<img src="' + newDadoImg + '" class="dado-img" data-dado="' + newDadoValue + '">');
                            bindDadoClick();
                        }
                    }
                } else {
                    alert("Por favor, insira um número válido.");
                }
            });

            $('#editar-dado').click(function() {
                var dadoToEdit = prompt("Digite o valor do dado que deseja editar:");
                if (dadoToEdit && !isNaN(dadoToEdit)) {
                    var newDadoValue = prompt("Digite o novo valor do dado:");
                    if (newDadoValue && !isNaN(newDadoValue)) {
                        var existingDado = $('.dado-img[data-dado="' + newDadoValue + '"]');
                        if (existingDado.length > 0) {
                            alert("Esse valor de dado já existe! Escolha outro valor.");
                        } else {
                            var newDadoImg = prompt("Digite a nova URL da imagem do dado:");
                            if (newDadoImg) {
                                var dadoImg = $('.dado-img[data-dado="' + dadoToEdit + '"]');
                                if (dadoImg.length > 0) {
                                    dadoImg.attr('src', newDadoImg);
                                    dadoImg.attr('data-dado', newDadoValue);
                                } else {
                                    alert("Dado não encontrado!");
                                }
                            }
                        }
                    } else {
                        alert("Por favor, insira um número válido.");
                    }
                } else {
                    alert("Por favor, insira um número válido.");
                }
            });

            $('#excluir-dado').click(function() {
            var dadoToDelete = prompt("Digite o valor do dado que deseja excluir:");
            if (dadoToDelete && !isNaN(dadoToDelete)) {
                var dadoImg = $('.dado-img[data-dado="' + dadoToDelete + '"]');
                if (dadoImg.length > 0) {
                    dadoImg.remove();
                } else {
                    alert("Dado não encontrado!");
                }
            } else {
                alert("Por favor, insira um número válido.");
            }
        });

        $('#jogar-novamente').click(function() {
                var dadoSelecionado = $('#dado-selecionado').text().replace('Dado selecionado: D', '');
                jogarDado(parseInt(dadoSelecionado));
            });

        $('#jogada-combinada').click(function() {
            var dadosSelecionados = prompt("Digite os valores dos dados que deseja jogar, separados por vírgula (ex: 4,6,8):");
            if (dadosSelecionados) {
                var dados = dadosSelecionados.split(',');
                var totalPontos = 0;
                var jogadas = "";

                dados.forEach(function(dado) {
                    var valor = parseInt(dado);
                    if (!isNaN(valor)) {
                        var pontos = Math.floor(Math.random() * valor) + 1;
                        totalPontos += pontos;
                        jogadas += "D" + valor + ": " + pontos + " ";
                    }
                });

                var resultado = totalPontos > 50 ?
                  '<div class="alert alert-success">Pontos das jogadas combinadas: ' + totalPontos + ' (' + jogadas.trim() + ')</div>' : 
                  '<div class="alert alert-info">Pontos das jogadas combinadas: ' + totalPontos + ' (' + jogadas.trim() + ')</div>';

                $('#resultado').html(resultado);
                $('#myModal').modal('show');
                $('#jogar-novamente').hide();
                var jogadas = parseInt($('#jogadas').text()) + 1;
                $('#jogadas').text(jogadas);
            } else {
                alert("Por favor, insira os valores dos dados separados por vírgula.");
            }
        });

        function bindDadoClick() {
            $('.dado-img').off('click').on('click', function() {
                var dado = $(this).data('dado');
                jogarDado(dado);
            });
        }

        bindDadoClick();
    });
</script>
</body>
</html>