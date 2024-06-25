<?php require './bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NomeDeFã</title>
    <link rel="stylesheet" href="<?= get_url() . 'public/css/style.css' ?>">
    <link rel="stylesheet" href="<?= get_url() . 'public/css/table.css' ?>">
    <link href="<?= get_url() . 'public/css/tabulator.min.css' ?>" rel="stylesheet">
    <!-- Tabulator JS -->
    <script type="text/javascript" src="<?= get_url() . 'public/js/tabulator.min.js' ?>"></script>
</head>
<body>
    <header id="main-header" class="banner">
        <div class="container">
            <div class="brand">
                <?php include 'svg/brand.php'; ?>
            </div>
            <div id="saiba-mais">?</div>
        </div>
    </header>