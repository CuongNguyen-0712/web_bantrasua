<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/product.css">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css">
  <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
  <title>CLOVER-TEA</title>
</head>

<body>

  <style>
    .product-form__image-img{
      width: 100px;
      height: 130px;
    }
  </style>
  <div class="product-form">
    <!-- Form -->
    <?php foreach($data['productCategory'] as $product): ?>
      <div class="product-form__form">
        <!-- Container -->
        <div class="product-form__container">
          <!-- Image -->
          <div class="product-form__image">
            <i class="product-form__image-icon fa-solid fa-clover"></i>
            <img src="/web_bantrasua/myapp/public/assets/img<?php echo $product['img_url'] ?>" alt="<?php echo $product['name'] ?>" class="product-form__image-img">
          </div>
          <!-- Content -->
          <div class="product-form__content">
            <h3 class="product-form__title"><?php echo $product['name']?></h3>
            <span class="product-form__cost"> <?php echo number_format($product['cost_default'], 0, ',', '.') . "\u{20AB}" ?></span>
          </div>
          <!-- Button -->
          <div class="product-form__buy">
            <a href="/web_bantrasua/myapp/user/order/viewProduct?id=<?php echo $product['id']?>" class="product-form__buy-btn">
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
            echo '<a href="?page=' . $i . '" class="pagination-item__link">' . $i . '</a>';
            echo '</li>';
        }
      echo '</ul>';
  }
  ?>



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