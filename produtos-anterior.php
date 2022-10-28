<?php

if(!isset($_POST['quantidade'])){
    header('Location: ./');
    die();
}

include "models/biblioteca_produtos.php";
$quantidade = $_POST['quantidade'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Produtos</title>
</head>

<body>
    <main>
        <?php include_once "views/header.php" ?>
        <section>
            <div class="etapa">
                <span>Etapa 2: Informar os produtos</span>
            </div>
            <div class="conteudo">
                <form action="resumo.php" method="post">
                    <span><b>Produto</b></span>
                    <span><b>Quantidade</b></span>
                    <?php for ($x = 0; $x < $quantidade; $x++) : ?>
                        <select name="produtos[]" id="produtos">
                            <?php foreach ($produtos as $chave => $produto) : ?>
                                <option value="<?= $chave ?>"><?= $produto['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="number" name="produtos_quantidade[]" id="produtos_quantidade" value="1">
                    <?php endfor; ?>

                    <button type="submit">Finalizar compra</button>
                </form>
            </div>
        </section>
        <?php include_once "views/footer.php" ?>
</body>

</html>