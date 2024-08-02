<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/connect.php');

//Thư viện phpmailer
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/phpmailer/Exception.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/phpmailer/PHPMailer.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/phpmailer/SMTP.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/function.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/session.php');

$listBrand = getRaw("SELECT * FROM brand");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellphoneZ</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/header.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/base.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/banner.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/footer.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/popup.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/hot-prod.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/contact.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/orderInfo.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/shopping_cart.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/mobile.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>
<body>
    <div class="app">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <a href="index.php" ><img src="" alt="Logo"></a>
            </div>

            <form class="header-search">
                <input class="search-input" type="text" placeholder="Tìm sản phẩm mong muốn...">
                <button class="search-btn" type="submit">

                    <img class="icon-search" src="<?php echo BASE_URL; ?>images/header-icon/search-icon.jpg" alt="">

                </button>
            </form>


            <nav class="navbar">
                <div class="navbar-list">
                    <div class="mobile">
                        <a href="<?php echo _WEB_HOST_1 ?>/mobile.php" >
                            <img class="navbar-item-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/mobile-icon.jpg">
                            <span>Điện Thoại</span>

                        </a>
                        <!-- menu con -->
                        <div class="all-mobile">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <?php
                                if (!empty($listBrand)) :
                                    foreach ($listBrand as $item) :
                                        // Kiểm tra nếu cateogory_Id của item bằng 1
                                        if ($item['cartegory_Id'] == 1) :
                                ?>
                                            <a href="">

                                                <?php echo $item['name'] ?>

                                            </a>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </div>

                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="iphone">
                        <a href="<?php echo _WEB_HOST_1 ?>/apple.php?brand_id=1"  class="ip-icon">
                            <img class="iphone-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/apple-icon.png"><span>Iphone</span>
                        </a>
                        <div class="all-iphone">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="samsung">
                        <a href="<?php echo _WEB_HOST_1 ?>/apple.php?brand_id=2" class="ss-icon">
                            <img class="samsung-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/samsung-icon.png" style="width: 70px;">
                            <span>SamSung</span>
                        </a>
                        <div class="all-samsung">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="laptop">
                        <a href="<?php echo _WEB_HOST_1 ?>/laptop.php" class="laptop-icon">
                            <img class="laptop-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/laptop-icon.jpg">
                            <span>Laptop</span>
                        </a>
                        <!-- menu con -->
                        <div class="all-laptop">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <?php
                                if (!empty($listBrand)) :
                                    foreach ($listBrand as $item) :
                                        // Kiểm tra nếu cateogory_Id của item bằng 1
                                        if ($item['cartegory_Id'] == 2) :
                                ?>
                                            <a href="">

                                                <?php echo $item['name'] ?>

                                            </a>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>
                            <div class="hot-laptop">
                                <h4>LAPTOP HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>
                    <div class="asus">
                        <a href="<?php echo _WEB_HOST_1 ?>/acer.php?brand_id=13"  class="asus-icon">
                            <img class="macbook-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/asus-icon.png" style="width: 35px">
                            <span>Asus</span>
                        </a>
                        <div class="all-asus">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="dell">
                        <a href="<?php echo _WEB_HOST_1 ?>/acer.php?brand_id=10"  class="dell-icon">
                            <img class="dell-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/dell-icon.png" style="width: 30px;">
                            <span>Dell</span>

                        </a>
                        <div class="all-dell">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="check-order">
                        <a href="">
                            <img class="check-order-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/08-Delivery_Truck-512.webp" style="width: 50px;">
                            <span>Kiểm tra đơn hàng</span></a>
                    </div>

                </div>

            </nav>
            <?php
            $count = 0;
            if (!empty($listCart)) :
                foreach ($listCart as $item) :
                    $count = $count + intval($item['soLuong']);
                endforeach;
            endif;
            ?>
            <div class="header-cart">
                <a href="<?php echo _WEB_HOST_1 ?>/shopping_cart.php" > <img class="header-cart-img" 
                src="<?php echo BASE_URL; ?>images/header-icon/cart-icon.png" style="width: 25px; height: 30px;;">
                    <span class="cart-quantity-item" id="count">
                        <?php echo $count ?>
                    </span>
                </a>
                <div class="cart-no-item">
                    <img src="<?php echo BASE_URL; ?>images/header-icon/no-cart.png" alt="">
                </div>
            </div>
            <div class="log-in">
                <a href="" class="log-in-icon">
                    <img class="log-in-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/login-icon.png" style="width: 30px;">
                    <span>ĐĂNG NHẬP</span>
                </a>
            </div>
        </header>