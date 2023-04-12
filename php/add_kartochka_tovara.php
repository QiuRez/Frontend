<?php 

    include($_SERVER['DOCUMENT_ROOT'] .'/php/databaseconnector.php');

    $sql = 'SELECT Name_tovar, Opisanie, Price, IMG, IMG_type FROM Products WHERE id = ' . $id;
    $result = mysqli_query($link, $sql);
    if ($result == false) {
        echo "Ошибка в подключении базы данных";
        echo $result.mysqli_error($link);
    } else {
        foreach($result as $row) {
            $name_tovar = $row["Name_tovar"];
            $opisanie = $row["Opisanie"];
            $price = $row["Price"];
            $IMG = $row["IMG"];
            $type = $row["IMG_type"];
        }
    }

    $i = 0;
    while ($i < 11) {
        $sql = "SELECT harakteristika".$i.", znachenie".$i." FROM Harakteristic WHERE id = ".$id;
        $result = mysqli_query($link, $sql);
        foreach($result as $row) {
            $harakteristik[$i] = $row["harakteristika".$i];
            $znachenie[$i] = $row["znachenie".$i];
        }
        if ($result == false) {
            echo $result.mysqli_error($link);
        }
        $i++;
    }
    
    $harakteristik = array_diff($harakteristik, array(''));
    $znachenie = array_diff($znachenie, array(''));
    mysqli_close($link);
    

?>