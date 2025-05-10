<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
        href="<?= ASSETS . 'icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css'; ?>" />
    <link rel="stylesheet" href="<?= ASSETS . 'styles/admin/statistics.css'; ?>" />
    <link rel="stylesheet" href="<?= ASSETS . 'styles/style.css'; ?>" />
</head>

<body>
    <section class="section_statistics">
        <div class="heading_statistics">
            <div class="intro_statistics">
                <h1>Thống kê</h1>
                <span>Tổng quan về mặt hàng và người tiêu dùng</span>
            </div>
        </div>
        <div class="content_statistics">
            <div class="header_statistics">
                <div class="basic_statistics">
                    <div class="info_basic">
                        <h2>Doanh thu</h2>
                        <div class="value_table">
                            <span class="value">
                                <?= number_format($totalCost, 0, ',', '.') ?> &#8363;
                            </span>
                        </div>
                    </div>
                </div>
                <div class="basic_statistics">
                    <div class="info_basic">
                        <h2>Đơn hàng</h2>
                        <div class="value_table">
                            <span class="value">
                                <?= htmlspecialchars($totalOrder) ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="basic_statistics">
                    <div class="info_basic">
                        <h2>Khách hàng</h2>
                        <div class="value_table">
                            <span class="value">
                                <?= htmlspecialchars($totalMember) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame_statistics">
                <div class="statistics_user">
                    <h2>Thống kê khách hàng</h2>
                    <form class="statistics_time" action="/web_bantrasua/myapp/admin/statistics/handleStatistics"
                        method="POST">
                        <div class="from_time">
                            <span>Từ ngày</span>
                            <input type="date" name="time_from" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="to_time">
                            <span>đến ngày</span>
                            <input type="date" name="time_to" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="statistics_button_handle">
                            <button type="submit">Thống kê</button>
                        </div>
                    </form>
                    <div class="table_user">
                        <ul class="statistics_value">
                            <li>5</li>
                            <li>4</li>
                            <li>3</li>
                            <li>2</li>
                            <li>1</li>
                            <li>0</li>
                        </ul>
                        <div class="statistics_column">
                            <?php if (!empty($result)): ?>
                            <?php foreach ($result as $row): ?>
                            <?php
                                    $percentHeight = min(round(($row['totalCost'] / 5000000) * 100, 2), 100);
                                    ?>
                            <div class="div_container">
                                <span class="columns" style="height: <?= $percentHeight ?>%;"></span>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="statistics_user_detail">
                    <div class="heading_detail">
                        <h2>Thống kê chi tiết khách hàng</h2>
                    </div>
                    <div class="frame_detail">
                        <?php if (!empty($result)): ?>
                        <?php foreach ($result as $row): ?>
                        <div class="content_detail">
                            <div class="heading_product">
                                <div class="info_detail">
                                    <i class="fa-solid fa-clover"></i>
                                    <h3><?= htmlspecialchars($row['username']) ?></h3>
                                </div>
                                <span>Số hóa đơn: <?= htmlspecialchars($row['totalOrder']) ?></span>
                                <button>Xem chi tiết</button>
                            </div>

                            <ul class="list_detail active">
                                <?php if (!empty($detail[$row['account_id']])): ?>
                                <?php foreach ($detail[$row['account_id']] as $orderId => $products): ?>
                                <li>
                                    <div class="detail">
                                        <span>Mã hóa đơn: <?= htmlspecialchars($orderId) ?></span>

                                        <?php $total = 0; ?>
                                        <?php foreach ($products as $product): ?>
                                        <?php $total += $product['total']; ?>
                                        <div class="info_order">
                                            <div class="order">
                                                <img src="/assets/img/milk.png" alt="Hình ảnh sản phẩm">
                                                <div class="info">
                                                    <span><?= htmlspecialchars($product['name']) ?></span>
                                                    <p>
                                                        Kích thước: <?= htmlspecialchars($product['size']) ?>,
                                                        Topping: <?= htmlspecialchars($product['topping']) ?>
                                                    </p>
                                                    <span>x<?= htmlspecialchars($product['quantity']) ?></span>
                                                </div>
                                            </div>
                                            <span><?= number_format($product['total'], 0, ',', '.') ?>&#8363;</span>
                                        </div>
                                        <?php endforeach; ?>

                                        <div class="total">
                                            <span>Tổng tiền</span>
                                            <span><?= number_format($total, 0, ',', '.') ?>&#8363;</span>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="<?= ASSETS . 'js/admin/statistics.js' ?>">
</script>

</html>