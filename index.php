<?php
session_start();
require_once 'functionality/db_connection.php';
require_once 'functionality/auth.php';
require_once 'functionality/edit.php';

$url = explode('/',$_SERVER['REQUEST_URI']);
$request = $url[1] != '' ? $url[1] : 'main';

//echo "Success: " . $_SESSION["success"].'<br>';
//echo "Request: " . $request;
//$num = (isset($_SESSION["num"])) ? $_SESSION["num"] : 0;
//$num++;
//$_SESSION["num"] = $num;
//echo "Obnovleniy: " . $_SESSION["num"]. '<br>';
//echo "Errors: " . $_SESSION["errors"]. '<br>';
//echo "Username: " . $_SESSION["username"]. '<br>';

if($request != file_exists('pages/'.$request. '.php') || $request == 'menu') {
    $request = '404';
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="header">
            <?php include 'pages/menu.php'; ?>
        </header>
        <main class="main">
            <div class="notifications">
                <?php
                if (isset($_SESSION["success"])) : ?>
                    <div class="success">
                        <p><?php echo $_SESSION["success"]; ?></p>
                    </div>
                    <?php unset($_SESSION["success"]); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION["errors"])) : ?>
                    <div class="errors">
                        <p><?php echo $_SESSION["errors"]; ?></p>
                    </div>
                    <?php unset($_SESSION["errors"]); ?>
                <?php endif; ?>
            </div>
            <?php include 'pages/' . $request . '.php' ?>
        </main>
        <footer class="footer"></footer>
        <script src="/js/script.js"></script>
    </div>
</body>
</html>
