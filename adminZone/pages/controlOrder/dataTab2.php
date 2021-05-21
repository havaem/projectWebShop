<?php
include("../../../config.php");
$dataOrderNew = mysqli_fetch_all($connect->query("SELECT * from theorder where isReceived=2"));
foreach ($dataOrderNew as $dataOrderNewItem) {
    $userBuy = mysqli_fetch_row($connect->query("SELECT username from user where id = $dataOrderNewItem[2]"))[0];
    $dataOrderNewItem[4] = number_format($dataOrderNewItem[4])."đ";
    echo<<<XXX
                <tr>
                    <td class="text-center">$userBuy</td>
                    <td class="text-center">$dataOrderNewItem[3]</td>
                    <td class="text-center">$dataOrderNewItem[4]</td>
                    <td class="text-center">$dataOrderNewItem[5]</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-success btnReceived" data-idSelect="$dataOrderNewItem[0]">ĐÃ GIAO HÀNG</button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-danger btnBreak" data-idSelect="$dataOrderNewItem[0]">HỦY</button>
                    </td>
                </tr>
    XXX;
}
