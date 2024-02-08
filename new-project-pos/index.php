<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
// use App\db;
// $conn = db::connect();
$db = new MysqliDb();
$page = "Home";
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
    <div class="container">
        <hr>
        <img src="<?= settings()['logo'] ?>" alt=""> 
        <span style="font-size: 30px; color:chocolate; margin-left: 200px;"><strong><i>BEST BUY SUPER SHOP</i></strong></span> <br>
        <span><i>কিনুন সাচ্ছন্দ্যে।</i></span>

        <?php require __DIR__ . '/components/menubar.php'; ?>
        <?php
        // echo testfunc();
        // var_dump(settings());
        $u = new User();
        // echo $u->testme();
        ?>
        <?php
        // $r = $conn->query("select * from users");
        $users = $db->get('users');
        // var_dump($users);
        // foreach($users as $user){
        //     echo $user['name']."(".$user['email'].")<br>";
        // }
        // echo "<h1>Total Users: ".count($users)."</h1>";
        ?>
        <!-- <hr> -->
        <?php
        // echo Category::testing();
        ?>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Phone</h5>
                        <strong>Regular Price: <del>2500tk</del></strong> <br>
                        <strong>Offer Price: 2000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/2.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cannon Camera</h5>
                        <strong>Regular Price: <del>200000tk</del></strong> <br>
                        <strong>Offer Price: 1,50,000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/3.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mistry Box</h5>
                        <!-- <strong>Regular Price: <del>2500tk</del></strong> <br> -->
                        <strong>Offer Price: 250 tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/4.avif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nike Shoes</h5>
                        <strong>Regular Price: <del>8,000 tk</del></strong> <br>
                        <strong>Offer Price: 6000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Phone</h5>
                        <strong>Regular Price: <del>2500tk</del></strong> <br>
                        <strong>Offer Price: 2000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/2.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cannon Camera</h5>
                        <strong>Regular Price: <del>200000tk</del></strong> <br>
                        <strong>Offer Price: 1,50,000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/3.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mistry Box</h5>
                        <!-- <strong>Regular Price: <del>2500tk</del></strong> <br> -->
                        <strong>Offer Price: 250 tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/4.avif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nike Shoes</h5>
                        <strong>Regular Price: <del>8,000 tk</del></strong> <br>
                        <strong>Offer Price: 6000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Phone</h5>
                        <strong>Regular Price: <del>2500tk</del></strong> <br>
                        <strong>Offer Price: 2000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/2.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cannon Camera</h5>
                        <strong>Regular Price: <del>200000tk</del></strong> <br>
                        <strong>Offer Price: 1,50,000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/3.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mistry Box</h5>
                        <!-- <strong>Regular Price: <del>2500tk</del></strong> <br> -->
                        <strong>Offer Price: 250 tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="max-width: 20rem;">
                    <img src="./product_image/4.avif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nike Shoes</h5>
                        <strong>Regular Price: <del>8,000 tk</del></strong> <br>
                        <strong>Offer Price: 6000tk</strong> <br>
                        <strong><button class="btn btn-primary" type="submit">+Add to cart</button></strong>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>