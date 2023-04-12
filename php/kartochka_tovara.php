
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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/add_kartochka_tovara.php') ?>




    <div class="content_tovar">
        <div class="img_price">
            <div class="photo_tovar">
                <?php echo '<img src="data:image/' . $type . ';base64,' . base64_encode($IMG) . '" >' ?>
            </div>
            <div class="price_tovar">
                <p><?php echo $price ?> Р</p>
                <button>Купить</button>
            </div>
        </div>
        <div class="info_tovara_kartochka">
            <div class="name_opisanie_tovara">
                <h3><?php echo $name_tovar ?></h3>
            </div>
            <div class="opisanie_tovara_kartochka">
                <p><?php echo $opisanie ?></p>
            </div>
            <div class="harakteristiki">
                <p>Характеристики:</p>
                <hr>
                <table>

                <?php

                    $i = 0;
                    while($i < count($harakteristik)) {
                        echo ('<tr>
                                <td id="harakteristika">'.$harakteristik[$i].'</td>
                                <td id="znachenie">'.$znachenie[$i].'</td>
                              </tr>');
                              $i++;
                    }
                    
                ?>

                </table>
            </div>
        </div>
    </div>
    


    <script src="/js/kartochka_tovara.js"></script>
    <script src="/js/script.js"></script>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/footer.php') ?>


</body>
</html>