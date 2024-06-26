<?php require './bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="Um projeto de catalogação colaborativa dos nomes de fãs desenvolvido por BlaBlaLab">
    <title>NomeDeFã</title>
    <style type="text/css">
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: url("<?= get_url() . 'public/assets/arrow-select.png' ?>") no-repeat calc(100% - 15px) #5B5B5B  !important;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="<?= get_url() . 'public/assets/favicon.ico' ?>">
    <link rel="stylesheet" href="<?= get_url() . 'public/css/style.css?ver=1.0.3' ?>">
    <link rel="stylesheet" href="<?= get_url() . 'public/css/table.css?ver=1.0.3' ?>">
    <link href="<?= get_url() . 'public/css/tabulator.min.css' ?>" rel="stylesheet">
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