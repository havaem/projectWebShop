<?php
include("../../../config.php");
$dataOrderNew = mysqli_fetch_all($connect->query("SELECT * from theorder where isReceived=2"));
foreach ($dataOrderNew as $item) {
    $userBuy = mysqli_fetch_row($connect->query("SELECT username from user where id = $item[1]"))[0];
    $item[3] = number_format($item[3])."đ";
    echo<<<XXX
                <tr>
                    <td class="text-center">$userBuy</td>
                    <td class="text-center">$item[0]</td>
                    <td class="text-center">$item[3]</td>
                    <td class="text-center">$item[4]</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-success btnReceived" data-idSelect="$item[0]">ĐÃ GIAO HÀNG</button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-danger btnBreak" data-idSelect="$item[0]">HỦY</button>
                    </td>
                </tr>
    XXX;
}
