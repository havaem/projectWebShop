<?php
    $connect=mysqli_connect('localhost','admin','admin','cnpm webshop');
    //==============================GET=============================================
    $get_user="SELECT id,username,password,name,age,gender,email,phone,address,history,date_created,rank,birthday,sumBought FROM user WHERE id=";
    $get_phone="SELECT * FROM product,phone WHERE product.id=phone.id AND product.id=";
    $get_laptop="SELECT * FROM product,laptop WHERE product.id=latop.id AND product.id=";
    $get_tablet="SELECT * FROM product,tablet WHERE product.id=tablet.id AND product.id=";
    $get_watch="SELECT * FROM product,watch WHERE product.id=watch.id AND product.id=";
    $get_allPhone="SELECT * FROM product,phone WHERE product.id=phone.id";
    $get_allLatop="SELECT * FROM product,laptop WHERE product.id=laptop.id";
    $get_allTablet="SELECT * FROM product,tablet WHERE product.id=tablet.id";
    $get_allWatch="SELECT * FROM product,watch WHERE product.id=watch.id";
    $get_allTheorder="SELECT * FROM theorder";
    $get_TheorderByUser="SELECT * FROM theorder WHERE id_user=";
    $get_TheorderByProduct="SELECT * FROM theorder WHERE id_product=";
    //===============================UPDATE=================================================================
    $update_product="UPDATE product 
                    SET 
                    product.type=
                    product.name=
                    product.image=
                    product.price=
                    product.stock=
                    product.rate=
                    product.view=
                    product.buy=
                    product.voucher=
                    product.configuration=
                    product.description=
                    product.manufacturer=
                    product.isVisible=
                    WHERE id=";
    $update_phone="UPDATE phone
                    SET
                    screen=
                    os=
                    camFront=
                    camBack=
                    cpu=
                    ram=
                    rom=
                    sim=
                    pin=
                    WHERE id=";
    $update_watch="UPDATE watch
                    SET
                    screen=
                    screenSize=
                    timePin=
                    os=
                    osConnect=
                    screenMaterial=
                    screenHeight
                    connect=
                    language=
                    followHealth=
                    WHERE id=";
    $update_tablet="UPDATE tablet
                    SET
                    screen=
                    os=
                    cpu=
                    ram=
                    rom=
                    camFront=
                    camBack=
                    pin=
                    WHERE id=";
    $update_laptop="UPDATE laptop
                    SET
                    cpu=
                    ram=
                    rom=
                    screen=
                    vga=
                    connector=
                    os=
                    design=
                    size=
                    release_date=
                    WHERE id=";
    $update_user="UPDATE user
                    SET
                    name=
                    age=
                    gender=
                    email=
                    phone=
                    address=
                    history=
                    date_created=
                    rank=
                    birthday=
                    otp=
                    WHERE id=";
    $update_manufacturer="UPDATE manufacturer
                            SET
                            name=
                            WHERE id=";
    $update_voucher="UPDATE voucher
                        SET
                        id_product=
                        type=
                        code=
                        precent=
                        price=
                        WHERE id=";
    //===============================INSERT======================================================
    $insert_voucher="INSERT INTO voucher (id_product,type,code,percent,price)
                        VALUES() ";
    $insert_manufacturer="INSERT INTO manufacturer(name)
                            VALUES ()";
    $insert_productType="INSERT INTO producttype(name)
                            VALUES ()";

?>