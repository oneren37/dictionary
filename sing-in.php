<?php require 'header.php' ?>
    <form action="auth.php" method="post" class="form form_auth">
        <div class="form__title">Авторизация</div>
        <input type="text" name="login"  placeholder="Логин">
        <input type="password" name="password"  placeholder="Пароль">
        <input type="submit">
        <a class="form__registration" href="../sing-up.php">Хочу зарегистрироваться</a>
    </form>
<?php require 'footer.php'?>