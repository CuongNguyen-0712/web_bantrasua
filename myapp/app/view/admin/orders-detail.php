<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/iframe.css'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
</head>

<body>
    <div class="header">
        <h1>Đơn hàng #<?= $order['id'] ?></h1>
    </div>
    <div class="content">
        <div class="content-info">
            <h2>Thông tin đơn hàng</h2>
            <div class="row">
                <p><strong>Người mua:</strong> <?= htmlspecialchars($order['username']) ?></p>
                <p class="right"><strong>Địa chỉ:</strong> <?= htmlspecialchars($order['street']) ?></p>
            </div>
            <div class="row">
                <p><strong>Ngày đặt:</strong> <?= date('d/m/Y', strtotime($order['order_date'])) ?></p>
                <p class="right"><strong>Quận:</strong> <?= $order['district'] ?></p>
            </div>
            <div class="row">
                <p><strong>Tỉnh/Thành phố:</strong> <?= $order['province'] ?></p>
                <p class="right"><strong>Phường/Xã:</strong> <?= $order['ward'] ?></p>
            </div>
            <div class="row">
                <p><strong>Trạng thái:</strong><span><?= $order['status'] ?></span> </p>
                <p class="right"><strong>Phương thức thanh toán:</strong> <?= $order['payment_method'] ?></p>
            </div>
            <h2>Chi tiết sản phẩm</h2>
        </div>
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Kích cỡ</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($details as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['product_name']) ?>
                                <?php if (!empty($item['toppings'])): ?>
                                    <br><small><i>Topping: <?= implode(', ', array_column($item['toppings'], 'name')) ?></i></small>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($item['size']) ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= number_format($item['price']) ?>₫</td>
                            <td><?= number_format($item['subtotal']) ?>₫</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <p><strong>Tổng giá sản phẩm:</strong> <?= number_format(array_sum(array_column($details, 'subtotal'))) ?>₫</p>
            <p><strong>Phí vận chuyển:</strong> <?= number_format($order['shipping_fee']) ?>₫</p>
            <p><strong>Tổng cộng:</strong> <?= number_format($order['total_price']) ?>₫</p>
        </div>
    </div>
    <div class="footer">
        <button onclick="window.history.back()">Xong</button>
    </div>
</body>

</html>