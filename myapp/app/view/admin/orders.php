<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/orders.css'; ?>">
  <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
  <link rel="stylesheet" href="<?php echo ASSETS . 'icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css'; ?>" />

</head>

<body>
  <div class="orders-detail">
    <div class="orders-detail-content">
      <iframe src="orders-detail.html" frameborder="0" width="100%" height="100%"></iframe>
    </div>
  </div>
  <form action="/web_bantrasua/myapp/admin/order/index" method="get">
    <div class="orders-heading">
      <div>
        <h1>Quản lí đơn hàng</h1>
        <p>Xem và thao tác các đơn hàng mua và đặt hàng của khách hàng trong cửa hàng Clover Tea</p>
        <div class="orders-heading-btn">
          <button type="submit">Lọc đơn hàng</button>
          <div class="select-status">
            <select name="sort">
              <option value="">Sắp Xếp</option>
              <option value="asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'asc') ? 'selected' : '' ?>>Tổng tiền tăng dần</option>
              <option value="desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'desc') ? 'selected' : '' ?>>Tổng tiền giảm dần</option>
            </select>
            <i class="fa-solid fa-sort-down"></i>
          </div>
        </div>
      </div>
      <div class="orders-fill">
        <div class="select-status">
          <select name="status">
            <option value="">Lọc theo trạng thái</option>
            <?php foreach ($statuses as $status): ?>
              <option value="<?= $status['name'] ?>" <?= (isset($_GET['status']) && $_GET['status'] == $status['name']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($status['name']) ?>
              <?php endforeach; ?>
          </select>
          <i class="fa-solid fa-sort-down"></i>
        </div>
        <div class="select-status">
          <select name="district">
            <option value="">Lọc theo Quận</option>
            <?php foreach ($districts as $district): ?>
              <option value="<?= $district['name'] ?>" <?= (isset($_GET['district']) && $_GET['district'] == $district['name']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($district['name']) ?>
              <?php endforeach; ?>
          </select>
          <i class="fa-solid fa-sort-down"></i>
        </div>
      </div>
      <div class="statistics_time">
        <div class="from_time">
          <span>Từ ngày</span>
          <input type="date" name="from_date" value="<?= $_GET['from_date'] ?? '' ?>">
        </div>
        <div class="to_time">
          <span>đến ngày</span>
          <input type="date" name="to_date" value="<?= $_GET['to_date'] ?? '' ?>">
        </div>
      </div>
    </div>
  </form>
  <div class="orders-table">
    <table>
      <thead>
        <tr>
          <th>STT</th>
          <th>Mã đơn</th>
          <th>Người mua</th>
          <th>Trạng thái</th>
          <th>Tổng tiền</th>
          <th>Ngày đặt</th>
          <th>Chi tiết</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($orders)): ?>
          <?php foreach ($orders as $index => $order): ?>
            <tr>
              <td><?= $offset + $index + 1 ?></td>
              <td><?= $order['id'] ?></td>
              <td><?= htmlspecialchars($order['customer_name']) ?></td>
              <td><?= htmlspecialchars($order['status']) ?></td>
              <td><?= number_format($order['total_price']) ?>₫</td>
              <td><?= date('d/m/Y', strtotime($order['order_date'])) ?></td>
              <td>
                <span class="orders-table_feature">
                  <a href="/web_bantrasua/myapp/admin/order/detail/<?= $order['id'] ?>">
                    <img src="<?= ASSETS . 'img/icon-order-1.png' ?>" alt="icon order"></td>
                  </a>
              </span>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">KHÔNG CÓ ĐƠN HÀNG NÀO !!.</td>
            <?php $index = -1; ?>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <div class="orders-pagination">
    <span><b><?= $offset + $index + 1 ?></b> trong số <b><?= $totalOrders ?></b> hóa đơn</span>
    <div class="orders-pagination_button">
      <?php
      $baseQuery = [
        'controller' => 'order',
        'action' => 'index',
        'status' => $_GET['status'] ?? '',
        'district' => $_GET['district'] ?? '',
        'sort' => $_GET['sort'] ?? '',
      ];
      ?>
      <?php if ($currentPage > 1): ?>
        <?php
        $prevQuery = array_merge($baseQuery, ['page' => $currentPage - 1]);
        ?>
        <a href="?<?= http_build_query($prevQuery) ?>">
          <i class="fa-solid fa-chevron-left"></i> Prev
        </a>
      <?php endif; ?>

      <?php if ($currentPage < $totalPages): ?>
        <?php
        $nextQuery = array_merge($baseQuery, ['page' => $currentPage + 1]);
        ?>
        <a href="?<?= http_build_query($nextQuery) ?>">
          Next <i class="fa-solid fa-angle-right"></i>
        </a>
      <?php endif; ?>

    </div>
    <script src="<?php echo ASSETS . 'js/admin/orders.js'; ?>"></script>
</body>

</html>