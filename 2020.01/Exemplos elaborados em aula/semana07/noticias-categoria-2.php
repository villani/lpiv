<?php

$noticias = [
    [
        "titulo" => "Descoberta a cura para o COVID-19",
        "resumo" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus labore officiis tempore, provident perferendis, nihil consequatur accusamus magnam obcaecati dignissimos molestias ipsa, autem quidem corporis minima quia maiores numquam.",
        "imagem" => "imagens/noticia1.jpg",
        "link" => "https://g1.globo.com/jornal-nacional/noticia/2020/03/19/pesquisadores-testam-remedios-para-combater-novo-coronavirus.ghtml",
    ],
    [
        "titulo" => "Fake ou News: Bolsonaro testa positivo para coronavírus",
        "resumo" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus labore officiis tempore, provident perferendis, nihil consequatur accusamus magnam obcaecati dignissimos molestias ipsa, autem quidem corporis minima quia maiores numquam.",
        "imagem" => "imagens/noticia2.jpg",
        "link" => "https://g1.globo.com/politica/noticia/2020/03/13/exame-de-coronavirus-de-bolsonaro-da-negativo.ghtml",
    ],
    [
        "titulo" => "Turistas são proíbidos de visitar a praia",
        "resumo" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus labore officiis tempore, provident perferendis, nihil consequatur accusamus magnam obcaecati dignissimos molestias ipsa, autem quidem corporis minima quia maiores numquam.",
        "imagem" => "imagens/noticia3.jpg",
        "link" => "https://g1.globo.com/sp/santos-regiao/noticia/2020/03/19/shoppings-academias-e-igrejas-serao-fechadas-e-praias-terao-acesso-proibido-na-baixada-santista-sp.ghtml",
    ],
];



?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>NOTÍCIAS DA CATEGORIA</title>
  </head>
  <body>

    <!-- INÍCIO DO LAYOUT -->

    <div class="container" style="background-color: rgb(230,230,230)">

        <div class="row justify-content-center">

            <div class="col-md-8" style="background-color: white">

                <h1 class="text-center">NOTÍCIAS DA CATEGORIA</h1>   

                <div class="d-flex flex-wrap justify-content-around">
                
                    <?php foreach ($noticias as $noticia): ?>

                    <div class="p-2 m-2 border" style="width: 30%">
                        <h2><?=$noticia['titulo']?></h2>
                        <p><img src="<?=$noticia['imagem']?>" class="img-fluid"></p>
                        <p><?=$noticia['resumo']?></p>
                        <p class="text-right"><a target="_blank" href="<?=$noticia['link']?>">Leia mais...</a></p>
                    </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>

    <!-- TÉRMINO DO LAYOUT -->
    
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>