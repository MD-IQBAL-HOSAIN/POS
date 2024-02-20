<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/components/header.php';
$db = new MysqliDb();
?>
<title>BEST BUY SUPER SHOP</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .scroller {
  width: 700px;
  height: 300px;
  /* overflow: scroll; */
  overflow-y: scroll;
  /* overflow-x: scroll; */
  scrollbar-width: thin;
}
</style>
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
                <div class="col-6 border">
                    <div class="container">
                        <form action="">
                            <div class="d-flex justify-content-around">
                                <div class="input-group p-1">
                                    <input class="form-control" type="text" name="" id="SearchInCustomer" placeholder="Customer name/id">
                                    <!-- <button class="input-group-text btn btn-secondary btn-outline-info"><i class="bi bi-search"></i></button> -->
                                </div>
                                <div class="input-group p-1">
                                    <!-- barcode search  -->
                                    <input class="form-control" type="number" name="" id="SearchInQR" placeholder="Barcode">
                                    <!-- <button class="input-group-text btn btn-secondary btn-outline-info"><i class="bi bi-search"></i></button> -->
                                </div>
                            </div>
                        </form>
                        <!-- customer set  up here -->
                        <div>
                            <!-- <table class="table table-responsive">
                            <tr>
                                <th>ID</th>
                                <th>Castomr Name</th>
                                <th>etc</th>
                            </tr>
                            <tr>
                                <td>0111</td>
                                <td>Nameee</td>
                                <td>0000000</td>
                            </tr>
                        </table> -->
                        </div>
                        <!-- barcode search and add to table -->
                        <div class="scroller">
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr class="row">
                                        <th class="col-2">Barcode</th>
                                        <th class="col-4">Product</th>
                                        <th class="col-2">Price</th>
                                        <th class="col-1">Qty</th>
                                        <th class="col-2">Total</th>
                                        <th class="col-1">E/D</th>
                                    </tr>
                                </thead>
                                <tbody id="add_product_container">

                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-4">
                                    customer
                                </div>
                                <div class="col-6">
                                <table class="table table-bordered table-striped">
                                <tr class="row">
                                    <th class="col-9">Total</th>
                                    <th class="col-3 text-end" id="nettotal"></th>
                                </tr>
                                <tr class="row">
                                    <th class="col-9">TAX</th>
                                    <th class="col-3 text-end" id="grandTAX"></th>
                                </tr>
                                <tr class="row">
                                    <th class="col-9">Discount</th>
                                    <th class="col-3 text-end" id="discount"></th>
                                </tr>
                                <tr class="row">
                                    <th class="col-9">Pay Amount</th>
                                    <th class="col-3 text-end" id="payamount"></th>
                                </tr>
                            </table>
                                </div>
                                <div class="col-2">
                                    <span class="flex align-items-end">

                                    
                                    <form action="">
                                        <input type="button" class="form-control btn btn-outline-warning p-1" value="Clear">
                                        <input type="button" class="form-control btn btn-outline-success p-1" value="Print">
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
            // autocomplete
            $("#SearchInQR").autocomplete({
                source: "search_qr.php",
                minLength: 1,
                select: function(event, ui) {
                    //console.log(ui);
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
                        $html += '<td class="col-2">' + response.barcode + '</td>';
                        $html += '<td class="col-4">' + response.name + '</td>';
                        $html += '<td class="pprice col-2 text-end">' + response.price + '</td>';
                        $html += '<td class="col-1 p-1"><input class="quantity form-control pt-1 pe-1" type="number" name="quantity" value="1" min="1" max="' + response.quantity + '"></td>';
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
            // nettotal creat
            function updateTotal() {

                // nettotal creat
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
        });
    </script>
</main>