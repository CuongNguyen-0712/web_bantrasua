<?php

namespace user;

use PDO;
use Database;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/cart&payment.css" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css" />
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png" />
    <title>Clover Tea</title>
</head>

<body>
    <div class="form">
        <!-- Cart -->
        <div class="cart-form">

            <!-- Header -->
            <div class="cart-form__header">
                <header class="cart-form__heading">GIAO HÀNG</header>
            </div>

            <!-- Address -->
            <div class="cart-form__form">

                <div class="cart-form__location-dot">
                    <i class="cart-form__location-dot-icon fa-solid fa-location-dot"></i>
                </div>

                <div class="cart-form__address">
                    <h5 class="cart-form__title">Địa chỉ</h5>
                    <span class="cart-form__describe">
                        <?php if (isset($data['address']) && is_array($data['address'])): ?>
                        <?php $fullAddress = $data['address']['street'] . ", " . $data['address']['ward'] . ", " . $data['address']['district'] . ", " . $data['address']['province'];
                            echo $fullAddress;
                            ?>
                        <?php else: echo 'Không có địa chỉ mặc định. ' ?>
                        <?php endif ?>
                    </span>
                </div>

                <div class="cart-form__btn">
                    <a href="/web_bantrasua/myapp/user/Cart/showAddressAndPhoneNumber">
                        <i class="cart-form__btn-icon fa-solid fa-chevron-right"></i>
                    </a>
                </div>

            </div>

            <!-- Information -->
            <div class="cart-form__form">

                <div class="cart-form__common">
                    <h5 class="cart-form__title"><?php echo $data['user_name']['username'] ?></h5>
                    <span class="cart-form__describ">Số điện thoại:
                        <?php echo $data['phone']['phone_number'] ?>
                    </span>
                </div>

                <div class="cart-form__btn">
                    <i class="cart-form__btn-icon fa-solid fa-chevron-right"></i>
                </div>

            </div>

            <!-- Time -->
            <div class="cart-form__form">

                <div class="cart-form__common">

                    <h5 class="cart-form__title">Thời gian nhận hàng</h5>

                    <div class="cart-form__clock">
                        <div class="cart-form__clock-clock">
                            <i class="cart-form__clock-icon fa-solid fa-clock"></i>
                        </div>
                        <div class="cart-form__content-clock">
                            <div class="cart-form__clock-title">
                                <h5 class="cart-form__title-clock">Nhận hàng trong: </h5>
                                <span class="cart-form__describ">&nbspHôm nay </span>
                            </div>

                            <div class="cart-form__clock-title">
                                <h5 class="cart-form__title-clock">Vào lúc:</h5>
                                <span class="cart-form__describ">&nbspCàng sớm càng tốt</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-form__btn">
                    <i class="cart-form__btn-icon fa-solid fa-chevron-right"></i>
                </div>

            </div>

            <!-- Note -->
            <div class="cart-form__form">
                <div class="cart-form__note">
                    <h5 class="cart-form__title">Ghi chú cửa hàng</h5>
                    <input type="text" class="cart-form__note-describ" placeholder="Ghi chú....">
                </div>

                <div class="cart-form__btn cart-form__btn-icon--margin">
                    <i class="cart-form__btn-icon fa-solid fa-chevron-right"></i>
                </div>

            </div>
        </div>

        <!-- Payment -->
        <div class="cart-form">
            <!-- Header -->
            <div class="cart-form__header">
                <header class="cart-form__heading">
                    <i class="fa-solid fa-bag-shopping"></i>
                    GIỎ HÀNG CỦA BẠN
                </header>
            </div>

            <!-- Product -->
            <div class="cart-form__product">
                <!-- Milk tea -->
                <?php if (empty($data['cart'])): ?>
                <div
                    style="min-height: 825px; width: 450px; display: flex; justify-content: flex-end; align-items: center;">
                    <p style="font-size: 20px; color: #666;"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng của bạn
                        đang trống</p>
                </div>
                <?php else: ?>
                <?php foreach ($data['cart'] as $item): ?>
                <div class="cart-form__product-form">
                    <div class="cart-form__product-item">
                        <div class="cart-form__product-image">
                            <img src="/assets/img/h5-removebg-preview.png" alt="Trà Sữa Clover Tea"
                                class="cart-form__product-img">
                        </div>


                        <div class="cart_container">

                            <div class="cart-form__product-content">
                                <h5 class="cart-form__product-title">
                                    <h5 class="cart-form__product-title"> <?php echo $item['name'] ?> </h5>
                                    <span class="cart-form__product-describ">Kích cỡ:
                                        <?= $item['size'] . ", " . $item['ice']['name'] . ", " . $item['sweet']['name'] ?>
                                        <?php foreach ($item['toppings'] as $topping): ?>
                                        <?= ", Topping: " . $topping['name'] ?>
                                        <?php endforeach; ?>
                                    </span>
                                </h5>
                            </div>


                            <div class="cart-form__product-footer">
                                <div class="cart-form__product-price">
                                    <?php echo number_format($item['price'], 0, ',', '.') . "\u{20AB}" ?></div>
                                <div class="cart-form__product-count">
                                    <button class="cart-form__product-btn">&#8722;</button>
                                    <span class="cart-form__product-number"><?php echo $item['quantity'] ?></span>
                                    <button class="cart-form__product-btn ">&#43;</button>
                                </div>
                            </div>

                        </div>
                        <div class="cart-form__product-repair">
                            <i class="cart-form__product-edit fa-solid fa-pen"></i>
                            <i class="cart-form__product-delete fa-solid fa-trash"></i>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <h5 class="cart-form__payment-title">Thông tin thanh toán</h5>
                <div class="cart-form__payment">
                    <ul class="cart-form__inform">
                        <li>Tổng tiền tạm tính</li>
                        <li>Phí vận chuyển</li>
                        <li>Tổng tiền &#40;Đã có&#41</li>
                    </ul>

                    <ul class="cart-form__inform">
                        <?php $total = 0; ?>
                        <?php foreach ($data['cart'] as $item): ?>
                        <?php $total += $item['totalPrice']; ?>
                        <?php endforeach; ?>
                        <?php echo number_format($total, 0, ',', '.') . "\u{20AB}" ?>
                        <li class="cart-form__cost-1">30.000&#8363</li>
                        <li class="cart-form__sum">
                            <?php echo number_format($data['totalBill'], 0, ',', '.') . "\u{20AB}" ?>
                        </li>
                    </ul>
                </div>


                <h5 class="cart-form__payment-title">Phương thức thanh toán</h5>
                <form action="/web_bantrasua/myapp/user/Confirm/show" class="cart-form__method-pay" method="post">
                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment_method" value="4">
                        <label for="methodid">Ví MoMo</label>
                    </div>

                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment_method" value="3">
                        <label for="methodid">Ví ZaloPay</label>
                    </div>

                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment_method" value="2">
                        <label for="methodid">Ví ShopeePay</label>
                    </div>

                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment_method" value="1">
                        <label for="methodid">Thanh toán bằng tiền mặt</label>
                    </div>

                    <div class="cart-form__clause">
                        <input type="checkbox" name="checkboxid" class="cart-form__clause-btn">
                        <label for="checkboxid" class="cart-form__clause-title">Tôi đã đọc, hiểu và đồng ý với tất cả
                            các
                            <span class="cart-form__clause-title-main">
                                <em>điều khoản, điều kiện và chính sách</em>
                            </span>
                            liên quan
                        </label>
                    </div>

                    <div class="cart-form__payment-button">
                        <input type="submit" value="TIẾN HÀNH THANH TOÁN" class="cart-form__payment-btn">
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>

        <!-- <div class="form-container">
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
        </div>     -->
    </div>

</body>

</html>