<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/header.php') ?>

    <div class="content">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/php/category.php') ?>
    </div>

    <form action="/index.php" class="pages" method="get">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages.php') ?>
    </form>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/footer.php') ?>

    <script src="/js/script.js"></script>
</body>
</html>