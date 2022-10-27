<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sistema</title>
</head>

<body>
    <main>
        <?php include_once "views/header.php" ?>
        <section>
            <div class="etapa">
                <span>Etapa 1: Informar a quantidade de itens comprados</span>
            </div>
            <div class="conteudo">
                <form action="produtos.php" method="post">
                    <input type="number" name="quantidade" id="quantidade" value="1">
                    <button type="submit" id="proximo">Próxima etapa</button>
                </form>
            </div>
        </section>
        <?php include_once "views/footer.php" ?>
    </main>
</body>

</html>