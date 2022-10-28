<?php

if (!isset($_POST['produtos'], $_POST['produtos_quantidade'])) {
    header('Location: ./');
    die();
}

include "models/biblioteca_produtos.php";

// abaixo variavel que armazena os "id" dos produtos, 
// esses ids são os indices dos produtos na array
// do arquivo biblioteca_produtos
$ids_produtos = $_POST['produtos'];

// abaixo variavel que armazena as quantidades dos produtos.
// para identificar cada produto, fiz os indices das arrays
// serem as mesmas, ou seja, se o produto está no indice 1 de $id_produtos, 
// então sua quantidade também estará no indice 1 do $quantidades_dos_ids
$quantidades_dos_ids = $_POST['produtos_quantidade'];

$total_geral = 0.0;
$totais_categorias = [];


// conectando os indices de $ids_produtos e $quantidades_dos_ids
// obtenho todas as informações do produto e mantenho a quantidade do ususario
foreach ($quantidades_dos_ids as $indice => $quantidade) {
    // conectando as informações >
    // 1 - obtenho o ID do produto baseado nos indices das duas arrays
    // 2 - agora tendo o ID, busca as informações do item e armazeno numa variavel
    $id_produto = $ids_produtos[$indice];
    $produto = $produtos[$id_produto];

    // 3 - retono o preço do produto
    // 4 - retorno a categoria;
    $preco_produto = $produto['preco'];
    $categoria_produto = $produto['categoria'];

    // 5 - calculo preço total desse produto
    $total_produto = $preco_produto * $quantidade;

    // 6 - somo o total do produto a categoria dele (verificando se a categoria ja teve algum valor somado)
    // 7 - somo o total do produto ao total geral de todos os itens
    $totais_categorias[$categoria_produto] =
        isset($totais_categorias[$categoria_produto]) ?
        $totais_categorias[$categoria_produto] + $total_produto :
        $total_produto;
    $total_geral += $total_produto;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Resumo</title>
</head>

<body>
    <main>
        <?php include_once "views/header.php" ?>
        <section>
            <div class="etapa">
                <span>Etapa 3: Resumo da compra</span>
            </div>
            <div class="conteudo">
                <p>Total a pagar: <b>R$ <?= number_format($total_geral, 2) ?></b></p>
                <br>
                <p>Gastos por categoria:</p>
                <?php foreach ($totais_categorias as $categoria => $total_categoria) : ?>
                    <p><?= ucfirst($categoria) ?>: <b>R$ <?= number_format($total_categoria, 2) ?></b></p>
                <?php endforeach; ?>
                <p><a href="./">Nova compra</a></p>
            </div>
        </section>
        <?php include_once "views/footer.php" ?>
</body>

</html>