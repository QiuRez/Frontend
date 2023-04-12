<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/style.css" />
    <title>Document</title>
  </head>
  <body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/databaseconnector.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/header.php') ?>

    <div class="content">

    <?php
    $text = $_GET['search'];
    if (strlen($text) > 0) {
        $sql = "SELECT id, Name_tovar, Opisanie, IMG, IMG_type, Price 
        FROM Products 
        WHERE (Opisanie LIKE '%"."$text"."%' OR Name_tovar LIKE '%"."$text"."%')";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        while($row = mysqli_fetch_array($result)) {
            echo (
            '<div class="tovar">' .
                '<a href="/tovars/'."{$row['id']}".'.php" style="text-decoration: none; color: black; cursor: pointer;">'.
                '<div class="photo">'.
                    '<img src="data:' . $row['IMG_type'] . ';base64,' . base64_encode($row['IMG']) . '" >'.
                '</div>'.

                '<div class="name_tovar">'.
                    '<p>'.$row["Name_tovar"].'</p>'.
                '</div>'.
                '</a>'.
                '<div class="info_tovara">'.
                    '<div class="info">'.
                        '<p>'. $row["Opisanie"]. '</p>'.
                    '</div>'.
                    '<div class="price_and_button">'.
                        '<div class="price">'.
                            '<p>'.$row["Price"].'</p>'.
                            '<p>Рублей</p>'.
                        '</div>'.

                        '<input type="button" class="button" id="but_v_korzina" value="Купить">'.
            
                    '</div>
                </div>
            </div>');
        }
        echo ($_POST['search']);
    }
    ?>

    </div>





    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/footer.php') ?>

    <script src="/js/script.js"></script>
  </body>
</html>
