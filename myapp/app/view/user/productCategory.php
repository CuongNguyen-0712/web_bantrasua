<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/product.css">
  <link rel="stylesheet"
    href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/grid.css">
  <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
  <title>CLOVER-TEA</title>
</head>

<body>

  <style>
    .product-form__image-img {
      width: 100px;
      height: 130px;
    }

    .search-results-info {
      margin: 8px 0 0 15px;
      font-size: 12px;
      color: #999;
      text-align: left;
      font-weight: normal;
    }

    .search-term {
      font-style: italic;
    }

    .no-results {
      text-align: center;
      padding: 30px;
      font-size: 18px;
      color: #666;
    }

    .product-form__title {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 180px;
      margin: 0 auto;
      text-align: center;
    }

    .product-form__content {
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  </style>

  <?php if (isset($data['isSearch']) && $data['isSearch']): ?>
    <div class="search-results-info">
      <?php if (!empty($data['selectedCategory'])): ?>
        <?php foreach ($data['categories'] as $category): ?>
          <?php if ($category['id'] == $data['selectedCategory']): ?>
            Loại: <?php echo $category['name']; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if ($data['minPrice'] > 0): ?>
        - Giá từ: <?php echo number_format($data['minPrice'], 0, ',', '.'); ?>₫
      <?php endif; ?>

      <?php if ($data['maxPrice'] > 0): ?>
        đến <?php echo number_format($data['maxPrice'], 0, ',', '.'); ?>₫
      <?php endif; ?>
    </div>
  <?php elseif (isset($data['categoryName'])): ?>
    <div class="search-results-info">
      Loại: <?php echo $data['categoryName']; ?>
    </div>
  <?php endif; ?>

  <div class="product-form">
    <!-- Form -->
    <?php foreach ($data['productCategory'] as $product): ?>
      <div class="product-form__form">
        <!-- Container -->
        <div class="product-form__container">
          <!-- Image -->
          <div class="product-form__image">
            <i class="product-form__image-icon fa-solid fa-clover"></i>
            <img src="/assets/img/h5-removebg-preview.png" alt="Trà Sữa Clover Tea" class="product-form__image-img">
          </div>
          <!-- Content -->
          <div class="product-form__content">
            <h3 class="product-form__title"><?php echo $product['name'] ?></h3>
            <span class="product-form__cost"> <?php echo number_format($product['cost_default'], 0, ',', '.') . "\u{20AB}" ?></span>
          </div>
          <!-- Button -->
          <div class="product-form__buy">
            <a href="/web_bantrasua/myapp/user/order/index" class="product-form__buy-btn">
              <button class="product-form__buy-btn">
                <i class="product-form__buy-cart fa-solid fa-cart-shopping"></i>
                Đặt mua
              </button>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Pagination -->
  <?php
  // Kiểm tra xem dữ liệu phân trang có tồn tại không
  if (isset($data['totalPage']) && isset($data['page'])) {
    echo '<ul class="pagination">';
    for ($i = 1; $i <= $data['totalPage']; $i++) {
      // Nếu là trang hiện tại, thêm class active
      if ($i == $data['page']) {
        echo '<li class="pagination-item pagination-item--active">';
      } else {
        echo '<li class="pagination-item">';
      }

      // Xây dựng URL phân trang với các tham số tìm kiếm
      $pageUrl = '?page=' . $i;

      // Nếu đang ở trang kết quả tìm kiếm, giữ các tham số tìm kiếm
      if (isset($data['isSearch']) && $data['isSearch']) {
        if (!empty($data['searchTerm'])) {
          $pageUrl .= '&search=' . urlencode($data['searchTerm']);
        }
        if (!empty($data['selectedCategory'])) {
          $pageUrl .= '&category=' . $data['selectedCategory'];
        }
        if (!empty($data['minPrice'])) {
          $pageUrl .= '&min_price=' . $data['minPrice'];
        }
        if (!empty($data['maxPrice'])) {
          $pageUrl .= '&max_price=' . $data['maxPrice'];
        }
        // Giữ cờ tìm kiếm nâng cao nếu có
        if (isset($_GET['advanced'])) {
          $pageUrl .= '&advanced=' . $_GET['advanced'];
        }
      }
      // Nếu đang xem sản phẩm theo danh mục, giữ tham số categoryID
      else if (isset($data['categoryID'])) {
        // Không cần thêm gì vào URL vì đã được xử lý trong route
      }

      echo '<a href="' . $pageUrl . '" class="pagination-item__link">' . $i . '</a>';
      echo '</li>';
    }
    echo '</ul>';
  }
  ?>



  <div class="form-container">
    <div class="form-container__contact">
      <p><span class="bolded">LIÊN HỆ</span></p>
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
      <p><span class="bolded">ĐỊA CHỈ</span></p>
      <p> <i class="fa-solid fa-location-pin"></i> Địa chỉ: F1/63/T ấp 6, xã Vĩnh Lộc A, huyện Bình Chánh,
        TP.Hồ Chí Minh</p>
    </div>

    <div class="form-container__rule">
      <p><span class="bolded">ĐIỀU KHOẢN SỬ DỤNG</span></p>
      <p><i class="fa-solid fa-shield"></i> Chính sách bảo mật thông tin</p>
      <p><i class="fa-solid fa-cart-arrow-down"></i> Chính sách đặt hàng</p>
    </div>
  </div>
</body>

</html>