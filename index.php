<?php include './includes/header.php'; ?>
<?php 
    use classes\FandomSuggestion;
    $activeSuggestions = FandomSuggestion::getActiveSuggestions();
?>
<?php include './includes/banner-info.php'; ?>
<?php include './includes/alert-error.php'; ?>
<?php include './includes/alert-warning.php'; ?>
<main>
    <div class="form-container">
        <div class="container">
            <form action="create.php" method='POST'>
                <label for="">
                    <p class="formLabel">Quem é fã de</p>
                    <input data-control-target="#categories" placeholder="digite aqui" name="artist" class="formInput" type="text" autocomplete="off" maxlength="40">
                </label>
                <label for="">
                    <p class="formLabel">se chama</p>
                    <input data-control-target="#send-control" placeholder="digite aqui" name="suggestion" class="formInput" type="text" autocomplete="off" maxlength="40">
                </label>

                <div class="actions">
                    <select id="categories" class="control" name="category" disabled>
                        <option value="">Categoria</option>
                        <option value="1">Internet</option>
                        <option value="2">Artes</option>
                        <option value="3">Esportes</option>
                        <option value="4">Negócios</option>
                        <option value="5">Outros</option>
                    </select>
                    <button id="send-control" class="control" type="submit" disabled>Adicionar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <?php include './includes/success-container.php'; ?>
        <table id="suggestions-table">
            <thead>
                <tr>
                    <th style="text-decoration:underline;">Quem</th>
                    <th>Fãs</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($activeSuggestions as $suggestion): ?>
                    <?php $originalHtml = !empty(@$suggestion['official']) 
                            ? '<span class="pill-official">OFICIAL</span>'  
                            : ''
                    ?>
                    <tr>
                        <td><?= @$suggestion['artist_name'] ?></td>
                        <td><?= @$suggestion['suggestion'] . $originalHtml ?></td>
                        <td><?= !empty(@$suggestion['category']) ? @$suggestion['category'] : 'Sem categoria'  ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include './includes/footer.php'; ?>
