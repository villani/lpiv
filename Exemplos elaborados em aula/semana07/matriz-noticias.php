<?php

$noticias = [
    [
        "titulo" => "Descoberta a cura para o COVID-19",
        "resumo" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus labore officiis tempore, provident perferendis, nihil consequatur accusamus magnam obcaecati dignissimos molestias ipsa, autem quidem corporis minima quia maiores numquam.",
    ],
    [
        "titulo" => "Fake ou News: Bolsonaro testa positivo para coronavírus",
        "resumo" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus labore officiis tempore, provident perferendis, nihil consequatur accusamus magnam obcaecati dignissimos molestias ipsa, autem quidem corporis minima quia maiores numquam.",
    ],
    [
        "titulo" => "Turistas são proíbidos de visitar a praia",
        "resumo" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus labore officiis tempore, provident perferendis, nihil consequatur accusamus magnam obcaecati dignissimos molestias ipsa, autem quidem corporis minima quia maiores numquam.",
    ],
];

print "<h1>" . $noticias[1]['titulo'] . "</h1>\n";
print "<p>" . $noticias[1]['resumo'] . "</p>\n";

// SELECIONANDO A NOTÍCIA DA MATRIZ
for ($i = 0; $i < count($noticias); $i++) {
    
    // SELECIONO O ITEM DA NOTÍCIAS
    foreach ($noticias[$i] as $indice => $valor) {
        
        print "<p><strong>$indice</strong>: $valor</p>\n";
    }

    print "<hr>\n";

}
