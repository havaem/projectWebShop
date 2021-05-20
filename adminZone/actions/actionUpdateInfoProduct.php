<?php
include("../../config.php");
$id = $_POST['id'];
$type = $_POST['type'];
$manufacturer = $_POST['manufacturer'];
$name = $_POST['name'];
$price = $_POST['price'];
$quanity = $_POST['quanity'];
$isVisible = $_POST['isVisible'];
$img = isset($_POST['img']) ? $_POST['img'] : null;
$desc = trim($_POST['desc']);
if ($type == 1) {
    $phoneScreen = $_POST['phoneScreen'];
    $phoneOS = $_POST['phoneOS'];
    $phoneFCAM = $_POST['phoneFCAM'];
    $phoneBCAM = $_POST['phoneBCAM'];
    $phoneCPU = $_POST['phoneCPU'];
    $phoneRAM = $_POST['phoneRAM'];
    $phoneROM = $_POST['phoneROM'];
    $phoneSIM = $_POST['phoneSIM'];
    $phonePIN = $_POST['phonePIN'];
    $configuration = trim("<div class=\'content__row\'><span class=\'content__row-title\'>Màn hình:</span>
                            <span class=\'content__row-content\'>$phoneScreen</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Hệ điều hành:</span>
                            <span class=\'content__row-content\'>$phoneOS</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Camera sau:</span>
                            <span class=\'content__row-content\'>$phoneBCAM</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Camera trước:</span>
                            <span class=\'content__row-content\'>$phoneFCAM</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Chip:</span>
                            <span class=\'content__row-content\'>$phoneCPU</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>RAM:</span>
                            <span class=\'content__row-content\'>$phoneRAM</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Bộ nhớ trong:</span>
                            <span class=\'content__row-content\'>$phoneROM</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>SIM:</span>
                            <span class=\'content__row-content\'>$phoneSIM</span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Pin:</span>
                            <span class=\'content__row-content\'>$phonePIN</span>
                        </div>");
    if ($img) {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            image='$img',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error");
        $connect->query("UPDATE product SET configuration='$configuration'WHERE id = $id") or die("error");
    } else {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error");
        $connect->query("UPDATE product SET configuration='$configuration'WHERE id = $id") or die("error");
    }
    //check exist
    if (mysqli_num_rows($connect->query("SELECT * from phone where id=$id")) > 0) {
        $connect->query("UPDATE phone SET screen='$phoneScreen',os='$phoneOS',camFront='$phoneFCAM',camBack='$phoneBCAM',cpu='$phoneCPU',ram='$phoneRAM',rom='$phoneROM',sim='$phoneSIM',pin='$phonePIN' WHERE id = $id");
    } else {
        $connect->query("INSERT INTO phone(id,screen,os,camFront,camBack,cpu,ram,rom,sim,pin) 
                    VALUES ($id,'$phoneScreen','$phoneOS','$phoneFCAM','$phoneBCAM','$phoneCPU','$phoneRAM','$phoneROM','$phoneSIM','$phonePIN')") or die("mysqli_error");
    }
} else if ($type == 2) {
    $laptopCPU = $_POST['laptopCPU'];
    $laptopRAM = $_POST['laptopRAM'];
    $laptopROM = $_POST['laptopROM'];
    $laptopScreen = $_POST['laptopScreen'];
    $laptopVGA = $_POST['laptopVGA'];
    $laptopConnector = $_POST['laptopConnector'];
    $laptopOS = $_POST['laptopOS'];
    $laptopDesign = $_POST['laptopDesign'];
    $laptopSize = $_POST['laptopSize'];
    $laptopReleaseDate = $_POST['laptopReleaseDate'];
    $configuration = trim("<div class=\'content__row\'>
                                <span class=\'content__row-title\'>CPU:</span>
                                <span class=\'content__row-content\'>
                                $laptopCPU
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>RAM:</span>
                                <span class=\'content__row-content\'>
                                $laptopRAM
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Ổ cứng:</span>
                                <span class=\'content__row-content\'>
                                $laptopROM
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Màn hình:</span>
                                <span class=\'content__row-content\'>
                                $laptopScreen
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Card màn hình:</span>
                                <span class=\'content__row-content\'>
                                $laptopVGA
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Cổng kết nối:</span>
                                <span class=\'content__row-content\'>
                                $laptopConnector
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Hệ điều hành:</span>
                                <span class=\'content__row-content\'>
                                $laptopOS
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Thiết kế:</span>
                                <span class=\'content__row-content\'>
                                $laptopDesign
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Kích thước:</span>
                                <span class=\'content__row-content\'>
                                $laptopSize
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Thời điểm ra mắt:</span>
                                <span class=\'content__row-content\'>
                                $laptopReleaseDate
                                </span>
                            </div>");
    if ($img) {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            image='$img',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error");
        $connect->query("UPDATE product SET configuration='$configuration'WHERE id = $id") or die("error");
    } else {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error");
        $connect->query("UPDATE product SET configuration='$configuration'WHERE id = $id") or die("error");
    }
    //check exist
    if (mysqli_num_rows($connect->query("SELECT * from laptop where id=$id")) > 0) {
        $connect->query("UPDATE laptop SET id='$id',cpu='$laptopCPU',ram='$laptopRAM',rom='$laptopROM',screen='$laptopScreen',vga='$laptopVGA',connector='$laptopConnector',os='$laptopOS',design='$laptopDesign',size=' $laptopSize',release_date='$laptopReleaseDate' WHERE  id = $id");
    } else {
        $connect->query("INSERT INTO laptop(id, cpu, ram, rom, screen, vga, connector, os, design, size, release_date) 
        VALUES ('$id','$laptopCPU','$laptopRAM','$laptopROM','$laptopScreen','$laptopVGA','$laptopConnector','$laptopOS','$laptopDesign','$laptopSize','$laptopReleaseDate')") or die("mysqli_error");
    }
} else if ($type == 3) {
    $tabletScreen = $_POST['tabletScreen'];
    $tabletOS = $_POST['tabletOS'];
    $tabletCPU = $_POST['tabletCPU'];
    $tabletRAM = $_POST['tabletRAM'];
    $tabletROM = $_POST['tabletROM'];
    $tabletcamF = $_POST['tabletcamF'];
    $tabletCamB = $_POST['tabletCamB'];
    $tabletPin = $_POST['tabletPin'];
    $configuration = trim("<div class=\'content__row\'>
                            <span class=\'content__row-title\'>Màn hình:</span>
                            <span class=\'content__row-content\'>
                            $tabletScreen
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Hệ điều hành:</span>
                            <span class=\'content__row-content\'>
                            $tabletOS
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>CPU:</span>
                            <span class=\'content__row-content\'>
                            $tabletCPU
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>RAM:</span>
                            <span class=\'content__row-content\'>
                            $tabletRAM
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Bộ nhớ trong:</span>
                            <span class=\'content__row-content\'>
                            $tabletROM
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Camera sau:</span>
                            <span class=\'content__row-content\'>
                            $tabletcamF
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Camera trước:</span>
                            <span class=\'content__row-content\'>
                            $tabletCamB
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Kết nối mạng:</span>
                            <span class=\'content__row-content\'>
                            $tabletPin
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Hỗ trợ SIM:</span>
                            <span class=\'content__row-content\'>
                                1 Nano SIM
                            </span>
                        </div>
                        <div class=\'content__row\'>
                            <span class=\'content__row-title\'>Đàm thoại:</span>
                            <span class=\'content__row-content\'>
                                Có
                            </span>
                        </div>");
    if ($img) {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            image='$img',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error1");
        $connect->query("UPDATE product SET configuration='$configuration'WHERE id = $id") or die("error2");
    } else {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error3");
        $connect->query("UPDATE product SET configuration='$configuration' WHERE id = $id") or die("error4");
    }
    //check exist
    if (mysqli_num_rows($connect->query("SELECT * from tablet where id=$id")) > 0) {
        $connect->query("UPDATE tablet SET id='$id',screen='$tabletScreen',os='$tabletOS',cpu='$tabletCPU',ram='$tabletRAM',rom='$tabletROM',camFront='$tabletcamF',camBack='$tabletCamB',pin='$tabletPin' WHERE id = $id");
    } else {
        $connect->query("INSERT INTO tablet(id, screen, os, cpu, ram, rom, camFront, camBack, pin)
         VALUES ('$id','$tabletScreen','$tabletOS','$tabletCPU','$tabletRAM','$tabletROM','$tabletcamF','$tabletCamB','$tabletPin')") or die("mysqli_error");
    }
} else if ($type == 4) {
    $watchScreen = $_POST['watchScreen'];
    $watchScreenSize = $_POST['watchScreenSize'];
    $watchTimePin = $_POST['watchTimePin'];
    $watchOS = $_POST['watchOS'];
    $watchOSConnect = $_POST['watchOSConnect'];
    $watchScreenMaterial = $_POST['watchScreenMaterial'];
    $watchScreenHeight = $_POST['watchScreenHeight'];
    $watchConnect = $_POST['watchConnect'];
    $watchLanguage = $_POST['watchLanguage'];
    $watchFollowHealth = $_POST['watchFollowHealth'];
    $configuration = trim("<div class=\'content__row\'>
                                <span class=\'content__row-title\'>Công nghệ màn hình</span>
                                <span class=\'content__row-content\'>
                                    $watchScreen
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Kích thước màn hình:</span>
                                <span class=\'content__row-content\'>
                                $watchScreenSize
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Thời gian sử dụng pin:</span>
                                <span class=\'content__row-content\'>
                                $watchTimePin
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Hệ điều hành:</span>
                                <span class=\'content__row-content\'>
                                $watchOS
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Kết nối với hệ điều hành:</span>
                                <span class=\'content__row-content\'>
                                $watchOSConnect
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Chất liệu mặt:</span>
                                <span class=\'content__row-content\'>
                                $watchScreenMaterial
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Đường kính mặt:</span>
                                <span class=\'content__row-content\'>
                                $watchScreenHeight
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Kết nối:</span>
                                <span class=\'content__row-content\'>
                                $watchConnect
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Ngôn ngữ:</span>
                                <span class=\'content__row-content\'>
                                $watchLanguage
                                </span>
                            </div>
                            <div class=\'content__row\'>
                                <span class=\'content__row-title\'>Theo dõi sức khỏe:</span>
                                <span class=\'content__row-content\'>
                                   $watchFollowHealth
                                </span>
                            </div>");
    if ($img) {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            image='$img',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error");
        $connect->query("UPDATE product SET configuration='$configuration'WHERE id = $id") or die("error");
    } else {
        $connect->query("UPDATE product SET 
                                            type='$type',
                                            name='$name',
                                            price='$price',
                                            stock='$quanity',
                                            description='$desc',
                                            manufacturer='$manufacturer',
                                            isVisible='$isVisible' 
                                        WHERE id = $id") or die("error");
        $connect->query("UPDATE product SET configuration='$configuration'WHERE id = $id") or die("error");
    }
    //check exist
    if (mysqli_num_rows($connect->query("SELECT * from watch where id=$id")) > 0) {
        $connect->query("UPDATE watch SET id='$id',screen='$watchScreen',screenSize='$watchScreenSize',timePin='$watchTimePin',os='$watchOS',osConnect='$watchOSConnect',screenMaterial='$watchScreenMaterial',screenHeight='$watchScreenHeight',connect='$watchConnect',language='$watchLanguage',followHealth='$watchFollowHealth' WHERE id=$id");
    } else {
        $connect->query("INSERT INTO watch(id, screen, screenSize, timePin, os, osConnect, screenMaterial, screenHeight, connect, language, followHealth) 
        VALUES ('$id','$watchScreen','$watchScreenSize','$watchTimePin','$watchOS','$watchOSConnect','$watchScreenMaterial','$watchScreenHeight','$watchConnect','$watchLanguage','$watchFollowHealth')") or die("mysqli_error");
    }
}
