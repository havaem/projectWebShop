<?php
include("../../../config.php");
$dataOrderNew = mysqli_fetch_all($connect->query("SELECT * from theorder where isReceived=1"));
$i = 1;
foreach ($dataOrderNew as $dataOrderNewItem) {
    $userBuy = mysqli_fetch_row($connect->query("SELECT username from user where id = $dataOrderNewItem[2]"))[0];
    $dataOrderNewItem[4] = number_format($dataOrderNewItem[4]) . "đ";
    echo <<<XXX
                <tr>
                    <th scope="row" class="text-center">$i</th>
                    <td class="text-center">$userBuy</td>
                    <td class="text-center">$dataOrderNewItem[3]</td>
                    <td class="text-center">$dataOrderNewItem[4]</td>
                    <td class="text-center">$dataOrderNewItem[5]</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-danger btnOrderDelete" data-idSelect="$dataOrderNewItem[0]">XÓA</button>
                    </td>
                </tr>
    XXX;
    $i++;
}
