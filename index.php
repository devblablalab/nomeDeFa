<?php 
    use classes\FandomSuggestion;
    require './bootstrap.php';
    $activeSuggestions = FandomSuggestion::getActiveSuggestions();
?>
<?php include './includes/header.php'; ?>
<div class="form-container">
    <div class="container">
        <form action="create.php" method='POST'>
            <label for="">
                <p class="formLabel">Quem é fã de</p>
                <input data-control-target="#categories" placeholder="digite aqui" name="artist" class="formInput" type="text" autocomplete="off">
            </label>
            <label for="">
                <p class="formLabel">se chama</p>
                <input data-control-target="#send-control" placeholder="digite aqui" name="suggestion" class="formInput" type="text" autocomplete="off">
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
<div class="container">
    <table id="suggestions-table" style="color:#fff;">
        <thead>
            <tr>
                <th>Quem</th>
                <th>Fãs</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($activeSuggestions as $suggestion): ?>
                <tr>
                    <td><?= @$suggestion['artist_name'] ?></td>
                    <td><?= @$suggestion['suggestion'] ?></td>
                    <td><?= @$suggestion['category'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include './includes/footer.php'; ?>
