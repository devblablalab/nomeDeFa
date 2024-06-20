<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NomeDeFã</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="container">

            <img src="assets/logoNomeDeFa.svg" alt="">
    
            <div class="saibaMais">?</div>

        </div>
    </header>

    <div class="formulario">
        <div class="container">
            <form action="registraFa.php" method='POST'>
                <label for="">
                    <p class="formLabel">Quem é fã de</p>
                    <input placeholder="digite aqui" name="artista" class="formInput" type="text">
                </label>
                <label for="">
                    <p class="formLabel">se chama</p>
                    <input placeholder="digite aqui" name="nomeFa"class="formInput" type="text">
                </label>


                <div class="actions">
                    <select name="categorias" id="">
                        <option value="Internet">Internet</option>
                        <option value="Artes">Artes</option>
                        <option value="Esportes">Esportes</option>
                        <option value="Negócios">Negócios</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <button type="submit">ENVIAR</button>

                </div>
            </form>


        </div>
    </div>









</body>
</html>
