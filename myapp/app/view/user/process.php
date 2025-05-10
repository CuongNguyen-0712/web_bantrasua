<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/process.css">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css">
  <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
    <title>Clover Tea</title>
</head>

<body>

    <div class="proccess-form-2">
        <header class="proccess-header">
            <div class="proccess-header__heading">
                <span class="proccess-header__heading-item">Clover Tea</span>
                <button class="proccess-header__heading-btn-chat">
                    <i class="fa-regular fa-comment"></i>
                    Chat
                </button>

                <button class="proccess-header__heading-btn-shop">
                    <i class="fa-solid fa-store"></i>
                    <a href="/web_bantrasua/myapp/user/home/index" class="proccess-header__heading-btn-content">Trang chủ
                    </a>
                </button>
            </div>
        </header>
    </div>

    <div class="order-form">
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
                        <?php if(!empty($productInfo['topping_name']) && !empty($productInfo['topping_id'])): ?>
                            <?php 
                                $da_ngot = [];
                                $toppings = [];
                                foreach($productInfo['topping_id'] as $index => $id):
                                    $name = $productInfo['topping_name'][$index];
                                    if($id >= 1 && $id <= 6): // đá - ngọt
                                        $da_ngot[] = $name;
                                    else: // topping
                                        $toppings[] = $name;
                                    endif;
                                endforeach;
                            ?>

                            <?php if(!empty($da_ngot)): ?>
                                <?php echo ", " . implode(", ", $da_ngot); ?>
                            <?php endif; ?>

                            <?php if(!empty($toppings)): ?>
                                <?php echo ", Topping: " . implode(", ", $toppings); ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo " "?>
                    <?php endif; ?>
                    </span>
                    <p>x<?php echo $productInfo['quantity']?></p>
                </div>

                <div class="order-form__cost"><?php echo number_format($productInfo['productTotal'], 0, ',', '.') . "\u{20AB}"?></div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

    <div class="detail-form">
        <ul class="detail-form__form">
            <li class="detail-form__form-item detail-form__form-item--content">Tổng tiền hàng</li>
            <li class="detail-form__form-item detail-form__form-item--content">Phí vận chuyển</li>
            <li class="detail-form__form-item detail-form__form-item--content">Thành tiền</li>
            <li class="detail-form__form-item detail-form__form-item--content">Phương thức Thanh toán</li>

        </ul>

        <ul class="detail-form__form">
            <li class="detail-form__form-item">
                <?php echo number_format($data['total'], 0, ',', '.') . "\u{20AB}"?>
            </li>       <!--chưa xử lý-->
            <li class="detail-form__form-item">
                <?php echo number_format($data['ship']['shipping_fee'], 0, ',', '.') . "\u{20AB}" ?>
            </li>
            <li class="detail-form__form-item detail-form__form-item-cost"> 
                <?php echo number_format($data['totalPrice']['total_price'], 0, ',', '.') . "\u{20AB}" ?>
            </li>
            <li class="detail-form__form-item detail-form__form-item--pay">
                <?php echo $data['payment']['name']?>
            </li>
        </ul>
    </div>      
        <!-- Another -->
        <div class="proccess-form__another">
            <div class="proccess-form__another-box">
                <span class="proccess-form__another-box-content">
                    Nếu hàng nhận được có vấn đề, đừng vội đánh giá 1 sao mà hãy liên hệ ngay với shop nhé
                    <i class="fa-regular fa-heart"></i>
                </span>
            </div>

            <div class="proccess-form__common">
                <button class="proccess-form__common-btn proccess-form__common-btn--buy">Mua Lại</button>
            </div>

            <div class="proccess-form__common">
                <button class="proccess-form__common-btn">Liên Hệ Người Bán</button>
            </div>
        </div>

</body>

</html>