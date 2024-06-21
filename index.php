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
            <form action="create.php" method='POST'>
                <label for="">
                    <p class="formLabel">Quem é fã de</p>
                    <input data-control-target="#categories" placeholder="digite aqui" name="artist" class="formInput" type="text">
                </label>
                <label for="">
                    <p class="formLabel">se chama</p>
                    <input data-control-target="#send-control" placeholder="digite aqui" name="suggestion" class="formInput" type="text">
                </label>


                <div class="actions">
                    <select id="categories" class="control" name="category">
                        <option value="1">Internet</option>
                        <option value="2">Artes</option>
                        <option value="3">Esportes</option>
                        <option value="4">Negócios</option>
                        <option value="5">Outros</option>
                    </select>
                    <button id="send-control" class="control" type="submit">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

<script type="module" src="js/main.js"></script>
</body>
</html>
