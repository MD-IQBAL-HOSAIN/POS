<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;

if (!Admin::Check()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

$db = new mysqliDb();
$cat_id = $_GET['cat_id'] ?? 1;
$db->where('category_id', $cat_id);
$products = $db->get('products');

?>
<form action="" class="flex-right">

</form>
<table class="table table-stripped table-hover">
    <tr>        
    <th>Product Id</th>
    <th>Code</th>
    <th>Name</th>
    <th>purchase price</th>
    <th>Retail price</th>
    <th>company name</th>
    <th>Quantity</th>
    <th>Product Edit</th>
    <td><a href='product_add.php' style="text-decoration: none;">ADD Product</a></td>
    <!-- <td><a href='product_add.php'><button class="btn btn-outline-success">ADD Product</button></a></td> -->
    </tr>
    <?php
    foreach ($products as $p) {
        echo
        "<tr>
             <td>{$p['id']}</td>
             <td>{$p['barcode']}</td>
             <td>{$p['name']}</td>
             <td>{$p['purchase_price']}</td>
             <td>{$p['retail_price']}</td>
             <td>{$p['company_name']}</td>
             <td>{$p['quantity']}</td>
             <td><a href='product_edit.php?product_id={$p['id']}'><i class='bi bi-pencil-square'></i></a></a> || <a href='#?product_id={$p['id']}' onclick='return confirm(\"Are you want sure want to delete ?\")'><i class='bi bi-trash3'></i></a> </td>
             <td></td>       
        <tr>";
        // <a href='product_add.php?product_id={$p['id']}'><i class='bi bi-plus-circle'></i></a></a></td> 
        #delete command
        // 
    }
    ?>

</table>