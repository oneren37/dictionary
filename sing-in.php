<?php require 'header.php' ?>
    <form action="auth.php" method="post" class="auth-form">
        <div class="auth-form__title">Авторизация</div>
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit">
        <a class="auth-form__registration" href="../sing-up.php">Хочу зарегистрироваться</a>
    </form>
<?php require 'footer.php'?>