<?php
include("../../../config.php");
$dataProducts = mysqli_fetch_all($connect->query("SELECT * from product"));
$num = 1;
foreach ($dataProducts as $product) {
    $priceProduct = number_format($product[4]) . "₫";
    $productType = mysqli_fetch_array($connect->query("SELECT name from producttype where id = $product[1]"));
    $checkbox = $product[13];
    $showCheckbox = "";
    if ($checkbox == 1) {
        $showCheckbox = "<input data-idSelect='$product[0]' style='width: 20px;height: 22px;' class='form-check-input position-static isVisibleCB' type='checkbox' id='blankCheckbox' value='option1' checked>";
    } else $showCheckbox = "<input data-idSelect='$product[0]' style='width: 20px;height: 22px;' class='form-check-input position-static isVisibleCB' type='checkbox' id='blankCheckbox' value='option1'>";
    echo <<<XXX
            <tr>
                <th class="text-center" scope="row">$num</th>
                <td><span class="d-inline-block text-truncate" style="max-width: 430px;">$product[2]</span></td>
                <td class="text-center">$productType[0]</td>
                <td class="text-center">$priceProduct</td>
                <td class="text-center">$product[5]</td>
                <td>
                    <div class="form-check text-center">
                    $showCheckbox
                    </div>
                </td>
                <td>
                    <div class="btn-group ">
                        <button type="button" data-toggle="modal" data-idSelect="$product[0]" data-target=".editProduct" class="btn btn-success btn-fw btnEditProduct">
                            <i class="mdi mdi-cloud-download"></i>Edit</button>
                        <button type="button" class="btn btn-danger btn-fw btnDeleteProduct" data-idSelect="$product[0]">
                            <i class="mdi mdi-alert-outline"></i>Delete</button>
                    </div>
                </td>
            </tr>
        XXX;
    $num++;
}
