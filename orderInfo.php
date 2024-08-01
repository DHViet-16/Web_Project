<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/orderInfo.css">
</head>

<body>
    <div class="cart-layout" >
        <div class="cart-info" id="cart">
            
            hiiiiiiii
        </div>
        <div class="cart-form">
            <h3>THÔNG TIN ĐẶT HÀNG</h3>
            <p><em>Bạn cần nhập đầy đủ các trường thông tin có dấu *</em></p>
            <form>
                <div class="fill-name">
                    <input type="text" placeholder="Họ và tên *" required>
                </div>
                <div class="fill-tel">
                    <input type="tel" placeholder="Số điện thoại *" required>
                </div>
                <div class="fill-email">
                    <input type="email" placeholder="Email">
                </div>

                <div class="delivery-options">
                    <strong>Hình thức nhận hàng</strong>
                    <div class="option-container">
                        <label class="option selected">
                            <input type="radio" name="delivery" value="home" checked>
                            <span class="checkmark"></span>
                            Nhận hàng tại nhà
                        </label>
                        <label class="option">
                            <input type="radio" name="delivery" value="store">
                            <span class="checkmark"></span>
                            Nhận hàng tại cửa hàng
                        </label>
                    </div>
                </div>

                <div id="homeDelivery" class="delivery-fields">
                    <div class="address">
                        <div class="province">
                            <select>
                                <option>Hà Nội</option>
                            </select>
                        </div>
                        <div class="district">
                            <select>
                                <option>Quận/Huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="detail-address">
                        <input type="text" placeholder="Địa chỉ nhận hàng *">
                    </div>
                </div>

                <div id="storePickup" class="delivery-fields" style="display:none;">
                    <div class="store-address">
                        <input type="text" value="Địa chỉ cửa hàng: Tiểu vương quốc Hóc Môn ">
                    </div>
                </div>

                <div class="note">
                    <textarea placeholder="Ghi chú" rows="3"></textarea>
                </div>

                <div class="confirm">
                    <button type="submit">XÁC NHẬN VÀ ĐẶT HÀNG</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Link js -->
<script src="js/cart-orderInfo.js"></script>
</body>

</html>