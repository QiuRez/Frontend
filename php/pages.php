<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/php/databaseconnector.php');
    $sql = "SELECT id FROM Products";
    $result = mysqli_query($link, $sql);
    if ($result) {
        $all_id = mysqli_num_rows($result);
        $pages = ceil($all_id / 5);
    }

    $i = 1;
    if(isset($_GET['category']) == false) {
        while ($i <= $pages){
            echo ("
            <button name="."page"." "."value="."$i".">$i</button>
            ");
            $i++;
        }
    }

     mysqli_close($link);
?>