<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$db = new MysqliDb();
if(isset($_POST['orders'])){
    $orders = $_POST['orders'];
    $costomerID = $db->escape($_POST['customer_id'])??1;
    $nettotal = $db->escape($_POST['nettotal']);
    $grandtotal = $db->escape($_POST['grandtotal']);
    $discount = $db->escape($_POST['discount']);
    $grandTAX = $db->escape($_POST['grandTAX']);
    $reference = $db->escape($_POST['reference']);
    $payment_method = $db->escape($_POST['payment_method']);
    $trxID = $db->escape($_POST['trxID']);
try{
    $db->startTransaction();
    // invoice
    $data = [
        'customer_id' => $costomerID,
        'total'=> $nettotal,
        'total_tax'=>$grandTAX,
        'discount'=> $discount,
        'pay_amount' => $grandtotal,
        'comment' => $reference,
        'payment_type' => $payment_method,
        'trxid' => $trxID,
    ];
    $db->insert('invoice',$data);
    $invoiceid = $db->getInsertId();
    foreach ($orders as $order) {
        $datas = [
            'invoice_id' => $invoiceid,
            'product_id' => $order['pid'],
            'quantity' => $order['qty'],
            'price' => $order['price'],
            'total' => $order['total'],
        ];
        $db->insert('invoicedetails',$datas);
    }
    $db->commit();
    echo "Insert Successfull";
}catch(\Throwable $th){
    echo $th->getMessage();
    $db->rollback();
    echo "Sala Ojoy";
}
    // $html = "";
    // foreach($orders as $order){
    //     $html.= 'ID :'.$order['pid']." Qty".$order['qty']." Total: ".$order['total']."<br>";
    // }


    // echo $html;
}