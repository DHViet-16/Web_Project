<?php
session_start();
require_once "./admin/config.php";
require_once "./admin/includes/connect.php";

//Thư viện phpmailer
require_once "./admin/includes/phpmailer/Exception.php";
require_once "./admin/includes/phpmailer/PHPMailer.php";
require_once "./admin/includes/phpmailer/SMTP.php";

require_once "./admin/includes/function.php";
require_once "./admin/includes/database.php";
require_once "./admin/includes/session.php";
$listProduct = getRaw("SELECT * FROM product");
$listCartegory = getRaw("SELECT * FROM cartegory");
$listBrand = getRaw("SELECT * FROM brand");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="./css/hot-prod.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Document</title>
    <style>
        .home {
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: #f8f9fa; */
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="home">
        <div class="banner">
            <div class="banner">
                <div class="banner-list">
                    <div class="banner-main">
                        <div class="banner1">
                            <div class="item">
                                <a href=""><img src="images/banner/fold-6.png" alt=""></a>
                            </div>
                            <div class="item">
                                <a href=""><img src="images/banner/fold5.png" alt=""></a>
                            </div>
                            <div class="item">
                                <a href=""><img src="images/banner/galaxy-s24-sale.jpeg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href=""> <img src="images/banner/iphone-15-series-sale.jpeg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href=""> <img src="images/banner/oppo-reno-12.png" alt=""></a>
                            </div>
                        </div>
                        <!-- button prev and next -->
                        <div class="buttons">
                            <button id="prev">
                                < </button>
                                    <button id="next">></button>
                        </div>
                        <!-- dots -->
                        <ul class="dots">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="banner-second">
                        <div class="banner2">
                            <a href="">Giảm ngay 3 triệu khi <br>đặt trước Iphone 16 Series và Galaxy ZFold6 tại SZ
                                <img src="./images/banner/fire.gif" style="width: 200px; height: 8px;" alt="">
                            </a>
                        </div>
                        <div class="banner3">
                            <a href=""><img src="./images/banner/Laptop-Dell-Gaming-G15-5535-banner.jpg" alt=""></a>
                        </div>
                        <div class="banner4">
                            <a href=""><img src="./images/banner/tuf-gaming-f15.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- script Banner -->
            <script src="/js/banner.js"></script>
            <!-- Content -->


        </div>

        <!-- Hot Prod -->
        <div class="hot-prod">
            <!-- Điện thoại -->
            <h2>Điện thoại nổi bật</h2>
            <div class="prod-mobile">
                    <div class="prod-mobile1">
                        <?php
                        //  Lọc sản phẩm theo danh mục
                        $filteredProducts = array_filter($listProduct, function($item) {
                            return $item['cartegory_Id'] == '1';
                        });

                        //  Trộn danh sách sản phẩm
                        // shuffle($filteredProducts);

                        //  Lấy 20 sản phẩm đầu tiên
                        $selectedProducts = array_slice($filteredProducts, 0, 20);

                        if (!empty($selectedProducts)) :
                            foreach ($selectedProducts as $item) :
                                $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                        ?>

                                    
                                <div class="mobile-link">
                                    <a href="">
                                        <img src="<?php echo $imagePath; ?>" alt="<?php echo $item['tenSanPham']; ?>">
                                        <div class="name"><?php echo $item['tenSanPham'] ?></div>

                                        <?php
                                        if ($item['giam'] != '0') :
                                        ?>
                                            <div class="sale">Giảm <?php echo $item['giam'] ?>%</div>
                                            <div class="price"><?php echo $item['giaKhuyenMai'] ?>đ <del><?php echo $item['giaSanPham'] ?>đ</del></div>
                                        <?php
                                        else :
                                        ?>
                                            <div class="price"><?php echo $item['giaKhuyenMai'] ?>đ</div>
                                        <?php
                                        endif;
                                        ?>
                                        <div class="tragop">Trả góp 0%</div>
                                        <div></div>
                                        <div class="love-icon">
                                            <div class="detail-star">
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            </div>
                                           <!-- <button class="add-product" id="add-to-cart" data-id="<?php echo $item['id']; ?>">
                                           <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                           <img src="images/hot-prod/cart-icon.png">
                                           </button> -->
                                           <form action="update_cart.php" method="POST">
                                                    <button type="submit" name="update_cart" value="1"><img src="images/hot-prod/cart-icon.png"></button>
                                                </form>
                                                                                    
                                        </div>
                                    </a>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>


            <!-- Laptop -->
            <h2>Laptop</h2>
            <div class="prod-laptop">
                <div class="prod-laptop1">
                <?php
                        // Bước 1: Lọc sản phẩm theo danh mục
                        $filteredProducts = array_filter($listProduct, function($item) {
                            return $item['cartegory_Id'] == '2';
                        });

                        // Bước 2: Trộn danh sách sản phẩm
                        // shuffle($filteredProducts);

                        // Bước 3: Lấy 15 sản phẩm đầu tiên
                        $selectedProducts = array_slice($filteredProducts, 0, 20);
                    ?>
                    <?php
                    if (!empty($selectedProducts)) :
                        foreach ($selectedProducts as $item) :
                            if ($item['cartegory_Id'] == '2') :
                                $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                    ?>
                                <div class="laptop-link">
                                    <a href="">
                                        <img src="<?php echo $imagePath; ?>" alt="<?php echo $item['tenSanPham']; ?>">
                                        <div class="name"><?php echo $item['tenSanPham'] ?></div>
                                        <?php
                                        if ($item['giam'] != '0') :
                                        ?>
                                            <div class="sale">Giảm <?php echo $item['giam'] ?>%</div>
                                            <div class="price"><?php echo $item['giaKhuyenMai'] ?>đ <del><?php echo $item['giaSanPham'] ?>đ</del></div>
                                        <?php
                                        else :
                                        ?>
                                            <div class="price"><?php echo $item['giaKhuyenMai'] ?>đ</div>
                                        <?php
                                        endif;
                                        ?>
                                        <div class="tragop">Trả góp 0%</div>
                                        <div class="love-icon">
                                            <div class="detail-star">
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            </div>
                                            <img src="images/hot-prod/cart-icon.png" onclick="updateCount()">
                                        </div>
                                    </a>
                                </div>
                    <?php
                            endif;
                        endforeach;
                    endif;
                    ?>

                </div>

            </div>
        </div>
    </div>
    <!-- script banner -->
    <script src="js/banner.js"></script>
    <!-- script cart -->

    <!-- <script src="js/cart-orderInfo.js"></script> -->

    <!-- <script>
    document.getElementById('add-to-cart').addEventListener('click', function() {
    fetch('update_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'update_cart=1'
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('cart_count').innerText = data;
    })
    .catch(error => console.error('Error:', error));
});

    </script> -->

</body>

</html>