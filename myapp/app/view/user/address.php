<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/address.css">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/font/Anton-Regular.ttf">
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
    <title>Clover Tea</title>
</head>
<body>
    <div class="address">
        <div class="address__overlay">
            <div class="address__body">
                <div class="address-form">
                    <i class="address-form-icon-x fa-solid fa-circle-xmark"></i>
                    <div class="address-form__container">

                        <div class="address-form__form-header">
                            <div class="address-form__header">
                                <header class="address-form__heading">Thay đổi địa chỉ giao hàng</header>
                            </div>   
                            <form action = "/web_bantrasua/myapp/user/Cart/saveAddress" method="post" class="address-form__input-address">
                                <i class="address-form__input-icon-search fa-solid fa-magnifying-glass"></i>
                                <input type="text" name="newAddress" class="address-form__input" placeholder="Vui lòng nhập địa chỉ">
                                <input type="submit" hidden>
                            </form>
    
                            <div class="address-form__location">
                                <h4 class="address-form__location-title">
                                    <i class="fa-solid fa-location-crosshairs"></i>
                                    Vị trí hiện tại của bạn
                                </h4>
                                <span class="address-form__location-content">
                                    <?php if( isset($data['address']) && is_array($data['address']) ): ?>
                                        <?php $fullAddress = $data['address']['street'] . ", " . $data['address']['ward'] . ", " . $data['address']['district'] . ", " . $data['address']['province'];
                                                echo $fullAddress;  
                                        ?>
                                        <?php else: echo 'Không có địa chỉ mặc định. ' ?>
                                    <?php endif?>
                                </span>
                            </div>
                        </div>

                        <div class="address-form__form-separate"></div>

                        <div class="address-form__form-footer">
                            <span class="address-form__form-footer-content"> <i><b>Lưu ý:</b> thay đổi địa chỉ giao hàng có thể thay đổi cước phí giao hàng hoặc không thể giao hàng nếu không có cửa hàng gần địa chỉ đã chọn.</i></span>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <script src="/web_bantrasua/myapp/public/assets/js/user/payment.js"></script>     <!-- chỗ này-->
</body>
</html>