<?php require 'header.php' ?>
    <form action="reg.php" method="post" class="form form_auth">
        <div class="form__title">Регистрация</div>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit">
    </form>
<?php require 'footer.php'?>