<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/php/databaseconnector.php');
    

    $name = $_POST['name_tovar'];
    $opisanie = $_POST['opisanie'];
    $price = $_POST['Price'];
    $harakteristik = $_POST['harakterisiki'];
    $znachenie = $_POST['znachenie'];
    $kategoriya = $_POST['kategorii'];
    $href = $_POST['href'];
    $file = addslashes(file_get_contents($_FILES['image_input']['tmp_name']));
    $file_type = $_FILES['image_input']['type'];



    $sql = "INSERT INTO Products VALUES (0, '$name', '$opisanie', '$file', '$file_type', $price, '$kategoriya', '$href')";
    $result = mysqli_query($link, $sql);


    if ($result == false) {
        echo "<p>" . $result.mysqli_error($link). "</p>";
    } else {
        $sql = "SELECT LAST_INSERT_ID() FROM Products";
        $last_id = mysqli_query($link, $sql);
        $last_id = mysqli_fetch_array($last_id);

        $harakteristik = [];
        $znachenie = [];
        $i = 0;
        while ($i < 11) {
            $harakteristik[$i] = $_POST['harakterisiki'.$i];
            $znachenie[$i] = $_POST['znachenie'.$i];
            $i++;
        }

        $sql = "INSERT INTO Harakteristic (id) VALUES ($last_id[0])";
        $result = mysqli_query($link, $sql);

        if ($result == true) {
            $i = 0;
            while ($i < 11) {
                $sql = "UPDATE Harakteristic
                 SET harakteristika".$i." = '$harakteristik[$i]', znachenie".$i." = '$znachenie[$i]'
                 WHERE id = ".$last_id[0];

                $result = mysqli_query($link, $sql);
                if ($result == false) {
                    echo $result.mysqli_error($link);
                }
                $i++;
            }
        } else {
            echo $result.mysqli_error($link);
        }

        if ($last_id == false) {
            echo $last_id.mysqli_error($link);
        } else {
            $fh = fopen($_SERVER['DOCUMENT_ROOT'] . '/tovars/' . $last_id[0] . ".php", 'w') or die("Нет");
            fputs($fh, '<?php $id = ' . "$last_id[0]; " . 'include($_SERVER["DOCUMENT_ROOT"]'.".'/php/kartochka_tovara.php'" . '); ?>' );
            fclose($fh);
        }
    }
    mysqli_close($link);

    function convertRUcharacters($str) {
        $from = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я','А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я');
        $to = array('a','b','v','g','d','e','e','zh','z','i','i','k','l','m','n','o','p','r','s','t','u','f','kh','cz','ch','sh','shh','','y','','e','yu','ya','A','B','V','G','D','E','E','ZH','Z','I','I','K','L','M','N','O','P','R','S','T','U','F','KH','CZ','CH','SH','SHH','','Y','','E','YU','YA');
        
        return str_replace($from, $to, $str);
    }
?>