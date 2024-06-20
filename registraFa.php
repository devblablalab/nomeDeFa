<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Pega os valores do formulário
        $artista = $_POST['artista'];
        $nomeFa = $_POST['nomeFa'];

        // Exibe os valores
        echo "Quem é fã de " .$artista. " se chama " .$nomeFa;
        
    }
    ?>