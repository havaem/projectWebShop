<?php
    include("../config.php");
    $id = $_POST['id'];
    $totalRecord = mysqli_num_rows($connect->query("SELECT * FROM comment WHERE id_product = $id"));
    if ($totalRecord != 0) {
        $totalPages = ceil($totalRecord / 4);
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == 1) {
                echo "<a class='comment__page-item active' href='javascript:void(0)'>" . $i . "</a>";
                continue;
            }
            echo "<a class='comment__page-item' href='javascript:void(0)'>" . $i . "</a>";
        }
    } 
    else {
        echo "<h1 style='color:red'>KHÔNG CÓ COMMENT NÀO :(</h1>";
    }
?>