<?php
session_start();
if(isset($_SESSION['idUserLogin']) || $_SESSION['idUserLogin']!=''){
    echo "1";
}
else echo "0";
?>