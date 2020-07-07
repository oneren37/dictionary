<?php if($_COOKIE['user'] == ""){
    header("Location: /sing-in.php");
}
?>
<?php require "header.php" ?>


<div class="wrap">
<form action="edit.php" method="post" class="form form_edit">
    <div class="form__title">Добавить новое слово</div>
    <input type="text" name="ru" placeholder="На русском">
    <input type="text" name="en" placeholder="На английском">
    <input type="submit" value="Добавить">
</form>


<div class="training">
    <div class="training-mode">
        <p>Режим тренировки: </p>
        <button id="ru-en">RU -> EN</button>
        <button id="en-ru">EN -> RU</button>
    </div>
    <div class="training-inner">
        <div id="task" class="training__task">тут слово</div>
        <input type="text" id="translation">
        <button id="check">Проверить </button>
        <div id="result"></div>
        <button id="next">Следующее слово</button>
    </div>
    
</div>
</div>

<script src="js/main.js"></script>
<?php require "footer.php" ?>
