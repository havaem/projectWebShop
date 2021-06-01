<?php
include("../../../config.php");
$dataOrderNew = mysqli_fetch_all($connect->query("SELECT * from theorder where isReceived=4"));
foreach ($dataOrderNew as $item) {
    $userBuy = mysqli_fetch_row($connect->query("SELECT username from user where id = $item[1]"))[0];
    $item[4] = number_format($item[3])."đ";
    echo<<<XXX
                <tr>
                    <td class="text-center">$userBuy</td>
                    <td class="text-center">$item[0]</td>
                    <td class="text-center">$item[4]</td>
                    <td class="text-center">$item[5]</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-success btnDelivery"data-idSelect="$item[0]">GIAO HÀNG</button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-danger btnBreak" data-idSelect="$item[0]">HỦY</button>
                    </td>
                </tr>
    XXX;
}
?>
