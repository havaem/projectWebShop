<?php

if (isset($_FILES['file']['name'])) {
    //Getting type folder
    $typeFolder = "";
    switch ($_POST['typeProduct']) {
        case '1':
            $typeFolder = "phone";
            break;
        case '2':
            $typeFolder = "laptop";
            break;
        case '3':
            $typeFolder = "tablet";
            break;
        case '4':
            $typeFolder = "watch";
            break;
        default:
            break;
    }


    /* Getting file name */
    $fileName = $_FILES['file']['name'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    $locationName = "../../assets/image/products/".$typeFolder."/" . to_slug($_POST['nameProduct']);
    //Create if no exist
    if (!file_exists($locationName)) {
        mkdir($locationName, 0777, true);
    }
    /* Location */
    $location = $locationName . "/" . $fileNameNew;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions */
    $valid_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $response = 0;
    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        /* Upload file */
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = $location;
        }
    }
    echo substr($response, 3, strlen($response));
    exit;
}
function to_slug($str)
{
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}
