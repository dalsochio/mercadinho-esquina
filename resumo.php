<?php

if (!isset($_POST['produtos'])) {
    header('Location: ./');
    die();
}

include "models/biblioteca_produtos.php";

$lista_produtos = $_POST['produtos'];

$total_geral = 0.0;
$totais_categorias = [];

foreach ($lista_produtos as $produto) {
    $produto = array_merge($produtos[$produto['id']], $produto);

    $total_produto = $produto['preco'] * $produto['quantidade'];

    $total_geral += $total_produto;
    $totais_categorias[$produto['categoria']] += $total_produto;
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
                <p>Total a pagar: <b>R$ <?= number_format($total_geral, 2, ",", "") ?></b></p>
                <br>
                <p>Gastos por categoria:</p>
                <?php foreach ($totais_categorias as $categoria => $total_categoria) : ?>
                    <p><?= ucfirst($categoria) ?>: <b>R$ <?= number_format($total_categoria, 2, ",", "") ?></b></p>
                <?php endforeach; ?>
                <p><a href="./">Nova compra</a></p>
            </div>
        </section>
        <?php include_once "views/footer.php" ?>
</body>

</html>