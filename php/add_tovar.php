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

    <form action="/php/add_tovar.php" method="POST" enctype="multipart/form-data">
    <div class="content_add_tovar">
        <h2 id="h2_add_tovar">Добавление товара в базу данных</h2>
        <div class="upload_photo_preview">
            <img src="" id="image_add_tovar" alt="">
            <input type="file" name="image_input" id="input_photo_add_tovar" accept="image/*" onchange="getFileSelected(event)">
            <p id="error"></p>
        </div>
        
        <div class="opisanie">
            <textarea name="name_tovar" id="name_add_tovar" cols="20" rows="2" placeholder="Название товара" style="resize: none ;"></textarea>
            <textarea name="opisanie" id="opisanie_tovara" cols="20" rows="10" placeholder="Описание товара" style="resize: none ;"></textarea>
            <div class="price_and_kategoriya">
                <select name="kategorii" id="selector">
                    <option selected disabled value="">Категория</option>
                    <option value="videocards">Видеокарта</option>
                    <option value="processors">Процессор</option>
                    <option value="ram">ОЗУ</option>
                    <option value="power_supplies">Блок питания</option>
                    <option value="cooling">Охлаждение</option>
                    <option value="headset">Гарнитура</option>
                    <option value="memory">Память</option>
                    <option value="body">Корпуса</option>
                    <option value="other">Другое</option>
                </select>
                <input type="number" name="Price" id="price_add_tovar" placeholder="Цена" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>
            <div class="harakteristika_add_tovar">
                <div class="harakteristiki_and_znachenii">
                    <input type="text" name="harakterisiki0" id="harakteristiki" placeholder="Характеристика">
                    <input type="text" name="znachenie0" id="znachenie" placeholder="Значение">
                    <input type="button" value="+" onclick="AddHaracteristik()">
                    <input type="button" value="-" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">
                </div>
            </div>
        </div>
        <input type="submit" name="submit_btn" id="create_add_tovar" value="Создать карточку товара" onclick="AddTovar()">
        <iframe id="my_iframe" style="display: none;"></iframe>
    </div>
    </form>

    <?php 
        if (isset($_POST['submit_btn'])) {
            include($_SERVER['DOCUMENT_ROOT'] . '/php/add_tovar_in_mysqli.php');
        }
    ?>



    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/footer.php') ?>

    <script src="/js/add_tovar_old.js"></script>
</body>
</html>