<!-- views/order/checkout.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Checkout | Clover Tea</title>
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/cart&payment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css">
   <style>

    
   </style>
</head>
<body>
    <div class="form">

        <!-- GIAO HÀNG -->
        <div class="cart-form">
            <div class="cart-form__header">
                <header class="cart-form__heading">GIAO HÀNG</header>
            </div>

            <div class="cart-form__form">
                <div class="cart-form__location-dot">
                    <i class="cart-form__location-dot-icon fa-solid fa-location-dot"></i>
                </div>
                <div class="cart-form__address">
                    <h5 class="cart-form__title">Địa chỉ</h5>
                    <span class="cart-form__describe"><?= htmlspecialchars($userInfo['address']) ?></span>
                </div>
            </div>

            <div class="cart-form__form">
                <div class="cart-form__common">
                    <h5 class="cart-form__title"><?= htmlspecialchars($userInfo['full_name']) ?></h5>
                    <span class="cart-form__describ">Số điện thoại: <?= htmlspecialchars($userInfo['phone']) ?></span>
                </div>
            </div>

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
            </div>


            <!-- Ghi chú -->
            <div class="cart-form__form">
                <div class="cart-form__note">
                    <h5 class="cart-form__title">Ghi chú cửa hàng</h5>
                    <input type="text" name="note" class="cart-form__note-describ" placeholder="Ghi chú....">
                </div>
            </div>
            

            <!-- Checkbox -->
            
        </div>

        <!-- GIỎ HÀNG -->
        <div class="cart-form">
            <div class="cart-form__header">
                <header class="cart-form__heading">
                    <i class="fa-solid fa-bag-shopping"></i>
                    GIỎ HÀNG CỦA BẠN (<?= count($cart) ?> món)
                </header>
            </div>

            <div class="cart-form__product">
                <?php foreach ($cart as $item): ?>
                            <div class="cart-form__product-form">
                                <div class="cart-form__product-item">
                                    <div class="cart-form__product-image">
                                        <img src="/web_bantrasua/myapp/public/assets/img/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="cart-form__product-img">
                                    </div>
                                    <div class="cart-form__product-content">
                                        <h5 class="cart-form__product-title"><?= htmlspecialchars($item['name']) ?></h5>
                                        <span class="cart-form__product-describ">Kích cỡ: <?= $item['size'] ?></span>
                                    </div>
                                    <?php if (!empty($item['topping_id'])): ?>
                            <span class="cart-form__product-describ">
                                Topping: <?= htmlspecialchars(implode(', ', $item['topping_id'])) ?>
                            </span>
                        <?php endif; ?>
                                </div>
                                <div class="cart-form__product-footer">
                                    <div class="cart-form__product-price"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>₫</div>
                                    <div class="cart-form__product-count">
                                        <span class="cart-form__product-number"><?= $item['quantity'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                <?php endforeach; ?>
            </div>

            <!-- Thông tin thanh toán -->
            <h5 class="cart-form__payment-title">Thông tin thanh toán</h5>
            <div class="cart-form__payment">
                <ul class="cart-form__inform">
                    <li>Tổng tiền tạm tính</li>
                    <li>Phí vận chuyển</li>
                    <li>Tổng tiền (Đã có)</li>
                </ul>
                <ul class="cart-form__inform">
                    <li><?= number_format($subtotal, 0, ',', '.') ?>₫</li>
                    <li><?= number_format($shipping_fee, 0, ',', '.') ?>₫</li>
                    <li class="cart-form__sum"><?= number_format($total, 0, ',', '.') ?>₫</li>
                </ul>
            </div>

            <!-- Phương thức thanh toán -->
            <form method="POST">
                <h5 class="cart-form__payment-title">Phương thức thanh toán</h5>
                <div class="cart-form__method-pay">
                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment" value="momo" required>
                        <label>Ví MoMo</label>
                    </div>
                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment" value="zalopay">
                        <label>Ví ZaloPay</label>
                    </div>
                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment" value="shopeepay">
                        <label>Ví ShopeePay</label>
                    </div>
                    <div class="cart-form__method-pay-btn">
                        <input type="radio" name="payment" value="cod">
                        <label>Thanh toán bằng tiền mặt</label>
                    </div>
                </div>
                <!-- Gửi đơn hàng -->
                <button type="submit" class="btn btn-primary">Đặt hàng</button>

            </form>
        </div>
    </div>
</body>
</html>
