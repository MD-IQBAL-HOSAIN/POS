<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "Customer Sale Point";
require __DIR__ . '/components/header.php';
$db = new MysqliDb();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<main>
    <div class="container-fluid">
    <hr>
        <img src="<?= settings()['logo'] ?>" alt="">
        <span style="font-size: 30px; color:chocolate; margin-left: 200px;"><strong><i>BEST BUY SUPER SHOP</i></strong></span> <br>
        <span><i>কিনুন সাচ্ছন্দ্যে।</i></span>
        

        <?php
        require __DIR__ . '/components/menubar.php';
        ?>

        <div class="vh-100">

            <div class="row">
                <div class="col-2 border mh-100">a</div>
                <div class="col-4 border mh-100">
                    <form action="">
                        <div class="d-flex">
                            <input class="form-control p-1" type="text" name="" id="" placeholder="Product search">
                        </div>
                    </form>
                </div>
                <div class="col-6 border bg-secondary bg-opacity-25">
                    <div class="container">
                        <form action="">
                            <div class="d-flex justify-content-around">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="input-group p-1">
                                            <input class="form-control" type="text" name="" id="SearchInCustomer" placeholder="Customer name/id">
                                            <input type="text" style="width: 65%;" class="input-group-text" name="" id="customer_id" readonly value="1">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group p-1">
                                            <!-- barcode search  -->
                                            <input class="form-control" type="number" name="" id="SearchInQR" placeholder="Barcode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- customer set  up here -->
                        <div>
                        </div>
                        <!-- barcode search and add to table -->
                        <div class="">
                            <table style="height: 400px;" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr class="row">
                                        <th class="col-2">Barcode</th>
                                        <th class="col-4">Product</th>
                                        <th class="col-2">Price</th>
                                        <th class="col-1">Qty</th>
                                        <th class="col-2">Total</th>
                                        <th class="col-1">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="add_product_container">

                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-5">
                                    <!-- Payment column  -->

                                    <div class="input-group">
                                        <span class="input-group-text">Ref:</span><input type="text" class="form-control" name="" id="reference">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Payment:</span>
                                        <!-- payment methode include -->
                                        <select name="payment_method" id="payment_method" class="form-control">
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Txn:ID</span>
                                        <input type="text" id="txnidin" class="d-none form-control" name="txnidin">
                                    </div>
                                    <!-- Payment column end  -->


                                </div>
                                <div class="col-5">
                                    <table class="table table-bordered table-striped table-sm">
                                        <tr class="row">
                                            <th class="col-6">Total</th>
                                            <th class="col-6 text-end" id="nettotal">0.00</th>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-6">TAX</th>
                                            <th class="col-6 text-end" id="grandTAX">0.00</th>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-6">Discount</th>
                                            <th class="col-6 text-end" id="discount">0.00</th>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-6">Pay Amount</th>
                                            <th class="col-6 text-end" id="payamount">0.00</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-2">
                                    <span class="flex align-items-end">
                                        <form action="">
                                            <input type="button" id="selCancel" class="form-control btn btn-outline-warning p-1" value="Cancel">
                                            <input type="button" id="placeOrder" class="form-control btn btn-outline-success p-1" value="Place Order">
                                        </form>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <select name="" id="">
            <option value="' + response.name + '" selected>' + response.name + '</option>
            <option value=""><a href="#" class="deleteproduct" data-id="' + response.id + '"><i class="bi bi-trash3"></i></a></option>
        </select> -->
        <!-- <a href="#" class="deleteproduct" data-id="' + response.id + '"><i class="bi bi-trash3"></i></a> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function financial(x) {
            return Number.parseFloat(x).toFixed(2);
        }
        $(function() {
            // autocomplete in product
            $("#SearchInQR").autocomplete({
                source: "search_qr.php",
                minLength: 1,
                select: function(event, ui) {
                    var id = ui.item.id;
                    addProduct(id);
                }
            });
            // add to table product and price
            function addProduct(id) {
                $.ajax({
                    url: 'product_add.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        // add new product row in table
                        $html = '<tr class="row ">';
                        $html += '<td class="productID d-none">' + response.id + '</td>';
                        $html += '<td class="col-2">' + response.barcode + '</td>';
                        $html += '<td class="col-4">' + response.name + '</td>';
                        $html += '<td class="pprice col-2 text-end">' + response.price + '</td>';
                        $html += '<td class="col-1 p-1"><input class="quantity form-control form-control-sm pt-1 pe-1" type="number" name="quantity" value="1" min="1" max="' + response.quantity + '"></td>';
                        $html += '<td class="itemtotals col-2 text-end">' + response.price + '</td>';
                        $html += '<td class="col-1" ><a href="#" class="deleteproduct" data-id="' + response.id + '"><i class="bi bi-trash3"></i></a></td>';
                        $html += '</tr>';
                        $('#add_product_container').append($html);
                        $("#SearchInQR").val("").focus();
                        updateTotal();
                    }
                });
            }
            $(document).on('blur change keyup', '.quantity', function() {
                var $row = $(this).closest('tr');
                var qty = $row.find('.quantity').val();
                var price = $row.find('.pprice').text();
                var tax = $row.find('.taxin').text();
                var textotal = tax * qty;
                var itemtotal = qty * price;
                $row.find('.itemtotals').text(financial(itemtotal));
                $row.find('.totaltaxin').text(financial(textotal));
                updateTotal();
            });
            // nettotal create
            function updateTotal() {

                // nettotal create
                var nettotal = 0;
                var grenTotal = 0;
                var discount = 0;
                $('.itemtotals').each(function() {
                    nettotal += parseFloat($(this).text());
                });

                $('#nettotal').text(financial(nettotal));
                // grandTax 
                $('#grandTAX').text(financial(nettotal * .05));
                //grand total
                grenTotal = parseFloat($('#nettotal').text()) + parseFloat($('#grandTAX').text());
                // console.log(grenTotal);
                if (grenTotal >= 1000) {
                    discount = grenTotal * 0.01;
                }
                $('#discount').text(financial(discount));
                $('#payamount').text(financial(Math.round(grenTotal - discount)));


            }
            // delete product
            $(document).on('click', '.deleteproduct', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                updateTotal();
            });
            //Cacncel button
            $(document).on('click', '#selCancel', function(e) {
                e.preventDefault();
                $("#add_product_container").empty();
                $("#reference").val('');
                $("#payment_method").val('1');
                // $("#txnidin").val('');
                $("#txnidin").addClass('d-none').val('');
                updateTotal();
            });
            $.post('account_pay_mathod.php', function(data) {
                var ac_name = JSON.parse(data);
                // console.log(ac_name);
                $.each(ac_name, function(index, account) {
                    $htmlop = '<option value="' + account.id + '">' + account.name + '</option>';
                    $('#payment_method').append($htmlop)
                });
            });
            //payment method
            $("#payment_method").change(function() {
                var payment_method = $(this).val();
                if (payment_method == '1') {
                    $("#txnidin").addClass('d-none');
                } else {
                    $("#txnidin").removeClass('d-none');
                }
            });
        });
        // place order
        $(document).on('click', '#placeOrder', function() {
            var payment_method = $('#payment_method').val();
            if (payment_method == 1) {
                var trxID = '';
            } else {
                var trxID = $('#txnidin').val();
                if (trxID == '') {
                    alert('Please enter Trx ID');
                    return;
                }
            }
            var order = [];
            $('.productID').each(function() {
                var productID = $(this).text();
                var qty = $(this).closest('tr').find('.quantity').val();
                var price = $(this).closest('tr').find('.pprice').text();
                var total = $(this).closest('tr').find('.itemtotals').text();
                order.push({
                    pid: productID,
                    price: price,
                    qty: qty,
                    total: total
                })
            });
            $.ajax({
                url: 'place_order.php',
                method: 'post',
                data: {
                    orders: order,
                    customer_id: $('#customer_id').val(),
                    nettotal: $('#nettotal').text(),
                    grandtotal: $('#payamount').text(),
                    discount: $('#discount').text(),
                    grandTAX: $('#grandTAX').text(),
                    reference: $('#reference').val(),
                    payment_method: payment_method,
                    trxID: trxID
                },
                success: function(response) {
                    console.log(response)
                    $("#add_product_container").empty();
                $("#reference").val('');
                $("#payment_method").val('1');
                // $("#txnidin").val('');
                $("#txnidin").addClass('d-none').val('');
                alert('Order placed successfully');
                updateTotal();
                }
            });
        });


        //  start function end
        // });
    </script>
</main>