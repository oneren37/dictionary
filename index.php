<?php if($_COOKIE['user'] == ""){
    header("Location: /sing-in.php");
}
?>
<?php require "header.php" ?>


<div class="wrap">
<form action="" method="post" class="form form_edit">
    <div class="form__title">Добавить новое слово</div>
    <input type="text" name="ru" placeholder="На русском" autocomplete="off" id="ru">
    <input type="text" name="en" placeholder="На английском" autocomplete="off" id="en">
    <input type="button" value="Добавить" id="add-new">
    <div class="error"></div>
</form>


<div class="training">
    <div class="training-mode">
        <p>Режим тренировки: </p>
        <button id="ru-en">RU -> EN</button>
        <button id="en-ru">EN -> RU</button>
    </div>
    <div class="training-inner">
        <div id="task" class="training__task"></div>
        <input type="text" id="translation">
        <button id="check">Проверить </button>
        <button id="next">Следующее слово</button>
    </div>
    
</div>
</div>

<script src="js/main.js"></script>
<?php require "footer.php" ?>

