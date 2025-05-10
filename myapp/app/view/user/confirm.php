<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/process.css" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css" />
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png" />
    <title>Clover Tea</title>

    <style>
        .detail-form{
            height: 250px;
        }
    </style>
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

        <?php foreach($data['cart'] as $item): ?>
            <div class="order-form">
                <div class="order-form__item">
                    <div class="order-form__item-image">
                        <img src="/assets/img/h5-removebg-preview.png" alt=">Trà Sữa Clover Tea" class="order-form__item-img">
                    </div>
        
                    <div class="order-form__content">
                         <h5 class="order-form__title"> <?php echo $item['name']?></h5>
                        <span class="order-form__describ">
                            <?= $item['size'] . ", " . $item['ice']['name'] . ", " . $item['sweet']['name'] ?>
                            <?php foreach($item['toppings'] as $topping): ?>
                                <?= ", Topping: " . $topping['name'] ?>
                            <?php endforeach; ?> 
                        </span>
                         <p>x<?php echo $item['quantity']?></p>
                    </div>
                    <div class="order-form__cost">
                        <?php echo number_format($item['price'], 0, ',', '.') . "\u{20AB}"?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    <div class="detail-form">
        <ul class="detail-form__form">
            <li class="detail-form__form-item detail-form__form-item--content">Tổng tiền hàng</li>
            <li class="detail-form__form-item detail-form__form-item--content">Phí vận chuyển</li>
            <li class="detail-form__form-item detail-form__form-item--content">Thành tiền</li>
            <li class="detail-form__form-item detail-form__form-item--content">Địa chỉ giao hàng</li>
            <li class="detail-form__form-item detail-form__form-item--content">Phương thức Thanh toán</li>

        </ul>

        <ul class="detail-form__form">
                <li class="detail-form__form-item">
                    <?php $total=0; ?>
                    <?php foreach($data['cart'] as $item): ?>
                    <?php $total += $item['totalPrice']; ?>
                    <?php endforeach; ?>
                    <?php echo number_format($total, 0, ',', '.') . "\u{20AB}" ?>
                </li>
            <li class="detail-form__form-item">30.000&#8363</li>
                  <li class="detail-form__form-item detail-form__form-item-cost">
                    <?php echo number_format($data['totalBill'], 0, ',', '.') . "\u{20AB}" ?>
                  </li>
                <li class="detail-form__form-item detail-form__form-item--pay">
                    <?php if( isset($data['address']) ): ?>
                        <?php $fullAddress = $data['address']['street'] . ", " . $data['address']['ward'] . ", " . $data['address']['district'] . ", " . $data['address']['province'];
                                    echo $fullAddress;  
                        ?>
                        <?php else: ?>
                            <?php echo " " ?>
                    <?php endif; ?>
                </li>
             <li class="detail-form__form-item detail-form__form-item--pay">
                <?php echo $data['payment']['name']?>
             </li>
        </ul>
    </div>
    <div class="btn_pay">
        <button class="btn">
            <a href="/web_bantrasua/myapp/user/Confirm/handleConfirm" style="color: white; text-decoration: none;">XÁC NHẬN THANH TOÁN</a>
        </button>
    </div>
</body>

</html>