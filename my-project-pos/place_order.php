<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
use App\User;
use App\model\Category;
$db = new MysqliDb();
?>
<?php

if(isset($_POST['orders'])){
    $orders = $_POST['orders'];
    $grandtotal = $db->escape($_POST['grandtotal']);
    $comment = $db->escape($_POST['comment']);
    $payment_method = $db->escape($_POST['payment_method']);
    $trxId =$db->escape( $_POST['trxId']);

    $html = "";
    echo "<h4><i>Payment Receipt</i></h4>"."<hr>";
    foreach ($orders as $order) {      
        $html .=  "<b>Product Name:</b> ". $order['pname'] . "<hr>" ."<b> Quantity: </b>". $order['qty'] ."<hr>";
    }
    $html .= "<b> Grand Total :</b> " . $grandtotal . "<hr>";
    $html .= "<b> Reference : </b>" . $comment . "<hr>";
    $html .= "<b> Payment Method : </b>" . $payment_method . "<hr>";
    $html .= "<b> Transaction ID : </b>" . $trxId . "<hr>";
    echo $html;
}
?>
