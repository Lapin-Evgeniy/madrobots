<?php
if($arResult['formSucces']): ?>
    <p>success</p>
<?php endif; ?>
<?php
if($arResult['formErrors']): ?>
    <?php foreach ($arResult['formErrors'] as $error): ?>
        <p><?= $error ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form id="review" name="review" method="POST" enctype="multipart/form-data">
    <label for="reviewTextarea">Текст отзыва</label>
    <textarea name="text" id="reviewTextarea" cols="30" rows="10"></textarea>

    <div class="raiting--group-block">
        <div class="radio--group-btn">
            <label for="raiting1">1</label>
            <br>
            <input type="radio" id="raiting1" name="raiting" value="1">
        </div>
        <div class="radio--group-btn">
            <label for="raiting2">2</label>
            <input type="radio" id="raiting2" name="raiting" value="2">
        </div>
        <div class="radio--group-btn">
            <label for="raiting3">3</label>
            <input type="radio" id="raiting3" name="raiting" value="3">
        </div>
        <div class="radio--group-btn">
            <label for="raiting4">4</label>
            <input type="radio" id="raiting4" name="raiting" value="4">
        </div>
        <div class="radio--group-btn">
            <label for="raiting5">5</label>
            <input type="radio" id="raiting5" name="raiting" value="5">
        </div>
    </div>
    <input class="btn btn-primary" type="submit" value="send" name="send">
</form>

