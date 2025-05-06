<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/purchase.css">
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/font/Arimo-VariableFont_wght.ttf">
    <title>Clover Tea</title>
</head>

<body>
    <div class="form">
        <ul>
            <a href="" class="header-form">
                <li class="header-form-item  header-form-item--all">Tất cả</li>
                <li class="header-form-item">Chờ giao hàng</li>
                <li class="header-form-item">Hoàn thành</li>
                <li class="header-form-item">Đã hủy</li>
                <li class="header-form-item">Trả hàng/Hoàn tiền</li>
            </a>
        </ul>

        <div class="purchase-form">
            <header class="purchase-header">
                <div class="purchase-header__heading">
                    <span class="purchase-header__heading-item">Clover Tea</span>
                    <button class="purchase-header__heading-btn-chat">
                        <i class="fa-regular fa-comment"></i>
                        Chat
                    </button>

                    <button class="purchase-header__heading-btn-shop">
                        <i class="fa-solid fa-store"></i>
                        <a href="/web_bantrasua/myapp/user/home/index" class="purchase-header__heading-btn-content">Trang
                            chủ </a>
                    </button>
                </div>

                <ul class="purchase-header-status">
                    <li class="purchase-header-status--success ">
                        <i class="fa-solid fa-truck"></i>
                         <?php if( isset($data['status']) ): ?>
                            <?php echo $data['status']['name']?>
                            <?php else: ?>
                                <?php echo "Không có trạng thái. "?>
                        <?php endif; ?>
                    </li>
                    <li class="purchase-header-status--rating purchase-header-status--separate">ĐÁNH GIÁ</li>
                </ul>
            </header>

            <a href="/web_bantrasua/myapp/user/process/show" class="order-form">
                <?php foreach($data['productInfo'] as $productInfo): ?>
                    <div class="order-form">
                        <div class="order-form__item">
                            <div class="order-form__item-image">
                                <img src="/assets/img/h5-removebg-preview.png" alt=">Trà Sữa Clover Tea" class="order-form__item-img">
                            </div>

                            <div class="order-form__content">
                                <h5 class="order-form__title"> <?php echo $productInfo['name']?></h5>
                                <span class="order-form__describ">
                                    Kích cỡ: <?php echo $productInfo['size']; ?>,
                                    Topping: <?php echo implode(", ", $productInfo['topping']); ?>
                                </span>
                                <p>x<?php echo $productInfo['quantity']?></p>
                            </div>

                            <div class="order-form__cost"><?php echo number_format($productInfo['productTotal'], 0, ',', '.') . "\u{20AB}"?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </a>

            <footer class="order-form__footer">
                <div class="order-form__ctn">Thành tiền:
                    <span class="order-form__ctn-cost">&nbsp;
                         <?php echo number_format($data['totalPrice']['total_price'], 0, ',', '.') . "\u{20AB}" ?>
                    </span>
                </div>
                <div class="order-form__btn">
                    <button class="order-form__btn-reorder">Mua lại</button>    <!--đang suy nghĩ có nên link cái này sang giỏ hàng không-->
                    <button class="order-form__btn-more">Thêm</button>
                </div>
            </footer>
        </div>
    </div>
    <div class="form-container">
        <div class="form-container__contact">
            <p><span class="bolded">LIÊN HỆ</span></p>
            <p><i class="fa-regular fa-envelope"></i> Email: clovertea2678@gmail.com</p>
            <p><i class="fa-solid fa-phone"></i> Hotline: 0968597549</p>
            <p><i class="fa-solid fa-building"></i> Công ty TNHH Clover Tea</p>

            <p>
                <i class="icon-contact-fb fa-brands fa-facebook"></i>
                <i class="icon-contact-ig fa-brands fa-instagram"></i>
                <i class="icon-contact-tiktok fa-brands fa-tiktok"></i>
            </p>
        </div>
        <div class="form-container__information">
            <p><span class="bolded">ĐỊA CHỈ</span></p>
            <p> <i class="fa-solid fa-location-pin"></i> Địa chỉ: F1/63/T ấp 6, xã Vĩnh Lộc A, huyện Bình Chánh,
                TP.Hồ Chí Minh</p>
        </div>
        <div class="form-container__rule">
            <p><span class="bolded">ĐIỀU KHOẢN SỬ DỤNG</span></p>
            <p><i class="fa-solid fa-shield"></i> Chính sách bảo mật thông tin</p>
            <p><i class="fa-solid fa-cart-arrow-down"></i> Chính sách đặt hàng</p>
        </div>
    </div>
</body>
</html>