<?php
include("../../../config.php");
$dataProducts = mysqli_fetch_all($connect->query("SELECT * from product"));
$num = 1;
foreach ($dataProducts as $product) {
    $productType = mysqli_fetch_array($connect->query("SELECT name from producttype where id = $product[1]"));
    echo <<<XXX
            <tr>
                <th class="text-center" scope="row">$num</th>
                <td><span class="d-inline-block text-truncate" style="max-width: 430px;">$product[2]</span></td>
                <td class="text-center">$productType[0]</td>
                <td class="text-center">$product[4]</td>
                <td class="text-center">100</td>
                <td>
                    <div class="form-check text-center">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                    </div>
                </td>
                <td>
                    <div class="btn-group ">
                        <button type="button" data-toggle="modal" data-idSelect="$product[0]" data-target=".editProduct" class="btn btn-success btn-fw btnEditProduct">
                            <i class="mdi mdi-cloud-download"></i>Edit</button>
                        <button type="button" class="btn btn-danger btn-fw">
                            <i class="mdi mdi-alert-outline"></i>Delete</button>
                    </div>
                </td>
            </tr>
        XXX;
    $num++;
}
