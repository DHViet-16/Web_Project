<?php
if (isPost()) {
    // var_dump($_POST,$_FILES);
    $dataInsert = [
        'tenSanPham' => $_POST['tenSanPham'] ?? '',
        'cartegory_Id' => $_POST['cartegory_id'] ?? '',
        'brand_Id' => $_POST['brand_id'] ?? '',
        'giam' => $_POST['giam'] ?? '',
        'giaSanPham' => $_POST['giaSanPham'] ?? '',
        'giaKhuyenMai' => $_POST['giaKhuyenMai'] ?? '',
        'anhSanPham' => $_FILES['anhSanPham']['name'],
        'kichThuocManHinh' => $_POST['kichThuocManHinh'] ?? '',
        'congNgheManHinh' => $_POST['congNgheManHinh'] ?? '',
        'doPhanGiaiManHinh' => $_POST['dophangiai'] ?? '',
        'cameraSau' => $_POST['cameraSau'] ?? '',
        'cameraTruoc' => $_POST['cameraTruoc'],
        'chipset' => $_POST['chipset'] ?? '',
        'cardDoHoa' => $_POST['cardDoHoa'] ?? '',
        'dungLuongRam' => $_POST['dungLuongRam'] ?? '',
        'boNhoTrong' => $_POST['boNhoTrong'] ?? '',
        'LoaiRam' => $_POST['LoaiRam'] ?? '',
        'oCung' => $_POST['oCung'] ?? '',
        'pin' => $_POST['pin'] ?? '',
        'heDieuHanh' => $_POST['heDieuHanh'] ?? '',
        'create_at' => date('Y-m-d H:i:s'),
    ];
    move_uploaded_file($_FILES['anhSanPham']['tmp_name'], "E:/xampp/htdocs/Web_Project/admin/modules/auth/uploads/" . $_FILES['anhSanPham']['name']);
    $insertStatus = insert('product', $dataInsert);
    if ($insertStatus) {
        setFLashData('smg', 'Thêm sản phẩm mới thành công!!');
        setFLashData('smg_type', 'success');
        redirect('?module=auth&action=productAdd');
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
        redirect('?module=auth&action=productAdd');
    }
}
layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');

$listCartegory = getRaw("SELECT * FROM cartegory");
$listBrand = getRaw("SELECT * FROM brand");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản phẩm</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js ? ver= <?php echo rand() ?>">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="admin-content-product_add">
        <h1>Thêm Sản phẩm</h1>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Nhập tên sản phẩm <span style="color:red;">*</span></label>
            <input name="tenSanPham" required type="text" placeholder="Nhập tên sản phẩm">
            <label for="cartegory_id">Chọn Danh mục<span style="color:red;">*</span></label>
            <select name="cartegory_id" id="cartegory_id">
                <option value="#">--Chọn Danh mục--</option>
                <?php
                if (!empty($listCartegory)) :
                    foreach ($listCartegory as $item) :
                ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name'] ?></option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>

            <label for="">Chọn loại sản phẩm<span style="color:red;">*</span></label>
            <select name="brand_id" id="brand_id">
                <option value="#">--Chọn loại sản phẩm--</option>
            </select>
            <label for="">Giảm<span style="color:red;">*</span></label>
            <input name="giam" required type="text" placeholder="Giảm">
            <label for="">Giá sản phẩm<span style="color:red;">*</span></label>
            <input name="giaSanPham" required type="text" placeholder="Giá sản phẩm">
            <label for="">Giá khuyến mãi<span style="color:red;">*</span></label>
            <input name="giaKhuyenMai" required type="text" placeholder="Giá khuyến mãi">
            <!-- <label for="">Tính năng nổi bật<span style="color:red;">*</span></label>
            <textarea name="" id="" cols="30" rows="5"></textarea> -->
            <label for="">Ảnh sản phẩm<span style="color:red;">*</span></label>
            <input name="anhSanPham" type="file">
            <label for="">Ảnh mô tả<span style="color:red;">*</span></label>
            <input multiple type="file">
            <br>
            <div class="phone-specs">
                <h2>Thông số kỹ thuật</h2>
                <br>
                <label for="">Kích thước màn hình</label>
                <input name="kichThuocManHinh" type="text" placeholder="Kích thước màn hình">
                <label for="">Công nghệ màn hình</label>
                <input name="congNgheManHinh" type="text" placeholder="Công nghệ màn hình">
                <label for="">Độ phân giải màn hình</label>
                <input name="dophangiai" type="text" placeholder="Độ phân giải màn hình">
                <label for="">Camera sau</label>
                <input name="cameraSau" type="text" placeholder="Camera sau">
                <label for="">Camera trước</label>
                <input name="cameraTruoc" type="text" placeholder="Camera trước">
                <label for="">Chipset</label>
                <input name="chipset" type="text" placeholder="Chipset">
                <label for="">Dung lượng RAM</label>
                <input name="dungLuongRam" type="text" placeholder="Dung lượng RAM">
                <label for="">Bộ nhớ trong</label>
                <input name="boNhoTrong" type="text" placeholder="Bộ nhớ trong">
                <label for="">Pin</label>
                <input name="pin" type="text" placeholder="Pin">
                <label for="">Hệ điều hành</label>
                <input name="heDieuHanh" type="text" placeholder="Hệ điều hành">
            </div>
            <div class="laptop-specs">
                <h2>Thông số kỹ thuật</h2>
                <label for="">Loại card đồ họa</label>
                <input name="cardDoHoa" type="text" placeholder="Loại card đồ họa">
                <label for="">Dung lượng RAM</label>
                <input name="dungLuongRam" type="text" placeholder="Dung lượng RAM">
                <label for="">Loại RAM</label>
                <input name="LoaiRam" type="text" placeholder="Loại RAM">
                <label for="">Ổ cứng</label>
                <input name="oCung" type="text" placeholder="Ổ cứng">
                <label for="">Kích thước màn hình</label>
                <input name="kichThuocManHinh" type="text" placeholder="Kích thước màn hình">
                <label for="">Công nghệ màn hình</label>
                <input name="congNgheManHinh" type="text" placeholder="Công nghệ màn hình">
                <label for="">Pin</label>
                <input name="pin" type="text" placeholder="Pin">
                <label for="heDieuHanh">Hệ điều hành</label>
                <input name="heDieuHanh" type="text" placeholder="Hệ điều hành">
                <label for="">Độ phân giải màn hình</label>
                <input name="doPhanGiaiManHinh" type="text" placeholder="Độ phân giải màn hình">
            </div>
            <button type="submit">Thêm</button>
        </form>
    </div>
    <script src="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js ? ver= <?php echo rand() ?>"></script>
    <script>
        $(document).ready(function() {
            $('#cartegory_id').change(function() {
                var x = $(this).val();
                $.get("<?php echo _WEB_HOST ?>?module=auth&action=productAdd_ajax", {
                    cartegory_id: x
                }, function(data) {
                    $("#brand_id").html(data);
                });
            });
            function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
            $('input[name="giaSanPham"], input[name="giam"]').on('input', function() {
                var giaSanPham = parseFloat($('input[name="giaSanPham"]').val()) || 0;
                var giam = parseFloat($('input[name="giam"]').val()) || 0;

                var giaKhuyenMai = giaSanPham - (giaSanPham * giam / 100);
                giaKhuyenMai = Math.round(giaKhuyenMai * 100) / 100; // Round to 2 decimal places

                $('input[name="giaKhuyenMai"]').val(formatNumber(giaKhuyenMai));
            });
            $('input[name="giaSanPham"]').on('blur', function() {
            var value = $(this).val().replace(/\./g, '');
            $(this).val(formatNumber(value));
        });
        });
    </script>
</body>

</html>