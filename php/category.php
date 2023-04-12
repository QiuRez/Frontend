<?php

include($_SERVER['DOCUMENT_ROOT'].'/php/databaseconnector.php');

if(isset($_GET['category'])) {
    $category = $_GET['category'];

    if (isset($_GET['page'])) {
        $get_page = $_GET['page'];
    } else {
        $get_page = 1;
    }
    $min_tovars = ($get_page * 5) - 5;
    $sql = "SELECT id, Name_tovar, Opisanie, IMG, IMG_type, Price FROM Products WHERE Categori = '$category' LIMIT $min_tovars, 5";
    $result = mysqli_query($link, $sql);

    if ($result) {
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
    }
} else {

    if (isset($_GET['page'])) {
        $get_page = $_GET['page'];
    } else {$get_page = 1;}
    $min_tovars = ($get_page * 5) - 5;
    $sql = "SELECT id, Name_tovar, Opisanie, IMG, IMG_type, Price FROM Products LIMIT $min_tovars, 5";
    $result = mysqli_query($link, $sql);

    if ($result) {
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
    }

}

mysqli_close($link);

?>