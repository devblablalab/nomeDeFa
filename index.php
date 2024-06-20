<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NomeDeFã</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header id="main-header">
        <div class="container">
            <div class="brand">
                <img src="assets/logoNomeDeFa.svg" alt="logo">
            </div>
            <div class="saibaMais">?</div>
        </div>
    </header>

    <div class="form-container">
        <div class="container">
            <form action="registraFa.php" method='POST'>
                <label for="">
                    <p class="formLabel">Quem é fã de</p>
                    <input data-control-target="#categories" placeholder="digite aqui" name="artista" class="formInput" type="text">
                </label>
                <label for="">
                    <p class="formLabel">se chama</p>
                    <input data-control-target="#send-control" placeholder="digite aqui" name="nomeFa" class="formInput" type="text">
                </label>


                <div class="actions">
                    <select id="categories" class="control" name="categories">
                        <option value="Internet">Internet</option>
                        <option value="Artes">Artes</option>
                        <option value="Esportes">Esportes</option>
                        <option value="Negócios">Negócios</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <button id="send-control" class="control" type="submit">Adicionar</button>
                </div>
            </form>


        </div>
    </div>

<script type="module" src="js/main.js"></script>
</body>
</html>
