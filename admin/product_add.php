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
$db = new MysqliDb();

if (isset($_POST['barcode'])) {

    $p_id = $_POST['id'];
    $p_barcode = $_POST['barcode'];
    $p_name = $_POST['name'];
    $p_com_name = $_POST['company_name'];
    $p_cat_id = $_POST['category_id'];
    $p_supp_id = $_POST['supplier_id'];
    $p_whole_price = $_POST['wholesale_price'];
    $p_retail_price = $_POST['retail_price'];
    $p_purchase_price = $_POST['purchase_price'];
    $p_quantity = $_POST['quantity'];
    $p_description = $_POST['description'];
    $p_tax = $_POST['tax'];
    $p_created = $_POST['created'];

    $data = [
        'barcode' => $p_barcode,
        'name' => $p_name,
        'company_name' => $p_com_name,
        'category_id' => $p_cat_id,
        'supplier_id' => $p_supp_id,
        'wholesale_price' => $p_whole_price,
        'retail_price' => $p_retail_price,
        'purchase_price' => $p_purchase_price,
        'quantity' => $p_quantity,
        'description' => $p_description,
        'tax' => $p_tax,
        'created' => $p_created,


    ];
    if ($db->insert('products', $data)) {
        $message = "User Updated successfully";
        header("location: category_all.php");
    } else
        $message = "Something went wrong, " . $db->getLastError();
}
?>

<?php require __DIR__ . '/components/header.php'; ?>
</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <!-- changed content -->
                <?php
                // if(isset($message)) echo $message;
                ?>
                <div class="container-md p-5">
                    <form action="" method="post">
                        <div class="h2">Porduct Insert</div>
                        <input class="form-control m-2" type="hidden" name="id">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">Barcode</div>
                                    <input class="form-control" type="text" name="barcode" require>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">Name</div>
                                    <input class="form-control" type="text" name="name" require>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="input-group mb-3">
                            <div class="input-group-text">Company_name</div>
                            <input class="form-control" type="text" name="company_name" require>
                        </div>
                            </div>
                            <div class="col-sm-3">
                            <div class="input-group mb-3">
                            <div class="input-group-text">Category_id</div>
                            <!-- <select name="category_id" id="">
                                <option value="">select</option>
                                <option value="1">Fruit</option>
                                <option value="2">Kids</option>
                                <option value="3">Grocery</option>
                                <option value="4">Electronics</option>
                                <option value="5">Footwear</option>
                                <option value="7">Accessories</option>
                                <option value="8">Art&Draft</option>
                            </select> -->
                            <input class="form-control" type="text" name="category_id" placeholder="1 to 8" require>
                        </div>
                            </div>
                            <div class="col-sm-3">
                            <div class="input-group mb-3">
                            <div class="input-group-text">Supplier_id</div>
                            <input class="form-control" type="text" name="supplier_id" placeholder="1 to 13" require>
                        </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Wholesale_price</div>
                            <input class="form-control" type="text" name="wholesale_price" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Retail_price</div>
                            <input class="form-control" type="text" name="retail_price" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Purchase_price</div>
                            <input class="form-control" type="text" name="purchase_price" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Quantity</div>
                            <input class="form-control" type="text" name="quantity" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Description</div>
                            <input class="form-control" type="text" name="description"  require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">VAT</div>
                            <input class="form-control" type="text" name="tax"  require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">Created Time</div>
                            <input class="form-control" type="text" name="created" require>
                        </div>

                        <input class="btn btn-outline-success" type="submit" value="Insert"> <br>

                    </form>
                </div>
                <!-- changed content  ends-->
            </main>
            <!-- footer -->
            <?php require __DIR__ . '/components/footer.php'; ?>
        </div>
    </div>
    <script src="<?= settings()['adminpage'] ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-area-demo.js"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/datatables-simple-demo.js"></script>
</body>

</html>