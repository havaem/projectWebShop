<?php
session_start();
include("../../../config.php");
$idAdminLogin = $_SESSION['idAdminLogin'];
$dataAdmin = mysqli_fetch_all($connect->query("SELECT * FROM admin where id != $idAdminLogin"));
$i = 0;
foreach ($dataAdmin as $item) {
    switch ($item[4]) {
        case '1':
            $lvAdmin = "HIGH LEVEL";
            $titleShow = "LOW LEVEL";
            break;
        case '2':
            $lvAdmin = "LOW LEVEL";
            $titleShow = "HIGH LEVEL";
            break;
        default:
            break;
    }
    echo <<<XXX
            <tr>
                <td class="text-center">$i</td>
                <td class="text-center">$item[2]</td>
                <th class="text-center">$item[1]</th>
                <th class="text-center">$lvAdmin</th>
                <td class="text-center">
                    <button type="button" class="btn btn-outline-success btnTogglePermission" data-idSelect="$item[0]">$titleShow</button>
                </td>
            </tr>
    XXX;
    $i++;
}
