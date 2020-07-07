<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Dictionary</title>
</head>
<body>
    <header class="header">
        <div class="header-inner container">
            <div class="header__logo">Dictionary</div>
            <div class="header__user">
                <?php echo $_COOKIE['user']?>
                <a href="exit.php">Выйти</a>
            </div>
        </div>
    </header>

