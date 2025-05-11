<html lang="en">

<head>
    <link rel="stylesheet" href="../../assets/styles/user/advacedSearchcopy.css">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/daDangNhapcopy.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOVER-TEA</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">  
    <link rel="stylesheet" href="../../assets/styles/user/grid.css">
    <link rel="stylesheet"
        href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css  ">
    <link href="../../assets/font/Arimo-VariableFont_wght.ttf" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Arimo:ital,wght@0,400..700;1,400..700&family=Lobster&family=Qwigley&display=swap"
        rel="stylesheet">

<body>
    <style>
        .menu__user {
            min-width: 250px;
            background-color: #f8f6f6;
            padding: 0px;
        }
        .menu__user-item{
            width: 100%;
            font-size: 15px;
            box-shadow: 1px 2px 3px rgb(95, 92, 92);

        }

        .menu__user-item li{
            width: 100%;
            padding: 10px;
        }
        .menu__user-item a{
            width: 100%;
            padding: 5px 10px;

        }

        .icon-login_1,
        .icon-login_2,
        .icon-login_3,
        .icon-login_4,
        .icon-login_5 {
            margin-right: 10%;
        }
        
        .header__search-find {
            display: flex;
            align-items: center;
        }
        
        .header__search-find form {
            display: flex;
            align-items: center;
            position: relative;
            width: 100%;
        }
        
        #search {
            width: 100%;
            padding-right: 40px; /* Space for the search icon */
        }
        
        .header__search-find-link {
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: transparent;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }
        .header__nav{
            box-shadow: 1px 2px 3px rgb(197, 192, 192);
            cursor: pointer;
        }
        
        .header__search-filter-link {
            display: flex;
            align-items: center;
            margin-left: 5px;
        }
        .Img__BestSeller{
            display: grid;
            justify-content: center;
            grid-template-columns: 12% 12% 12% 12%;
            column-gap: 2%;
        }
        .product-form__form{
            width: 100%;
            height: 250px;
        }
        .product-form__buy-btn{
            min-height: 30px;
        }
        .status__bestseller{
            display: grid;
            justify-content: center;
            grid-template-columns: 18% 18% 18% 18%;
            column-gap: 1%;  
        }
        
    </style>
    <div class="web">
        <header>
            <div class="header">
                <!-- Header__search -->
                <div class="header__search">
                    <!-- LOGO -->
                    <!-- HEADER__SEARCH-LOGO -->
                    <div class="header__search-logo">
                        <a onclick="handleLoadContent('logined-content')" class="header__search-logo-link">
                            <i class="icon-logo fa-solid fa-clover"></i>
                            <span>CLOVER-TEA</span>
                        </a>
                    </div>
                    <!-- HEADER__SEARCH-FIND -->
                    <div class="header__search-find">
                        <form action="/web_bantrasua/myapp/user/home/search" method="GET" id="searchForm">
                            <input type="text" placeholder="Tìm kiếm theo sản phẩm" id="search" name="search">
                            <!-- Set advanced search flag to 0 by default (basic search) -->
                            <input type="hidden" id="advanced" name="advanced" value="0">
                            <!-- icon-search -->
                            <button type="submit" class="header__search-find-link">
                                <i class="icon-search fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <!-- icon-filter -->
                        <a href="#" class="header__search-filter-link" id="showAdvancedSearch">
                            <i class="icon-filter fa-solid fa-filter">
                                <!-- MENU__FILTER -->
                                <div class="menu__filter" id="advancedSearchMenu">
                                    <h3>Bộ Lọc Tìm Kiếm</h3>
                                    <!-- Advanced search form -->
                                    <form id="advancedSearchForm">
                                        <!-- Category filter -->
                                        <ul class="menu__filter-item"><i class="fa-solid fa-tags"></i> Phân loại
                                            <?php foreach ($data['categories'] as $category): ?>
                                            <li>
                                                <input type="radio" name="category" id="category_<?php echo $category['id']; ?>" value="<?php echo $category['id']; ?>">
                                                <label for="category_<?php echo $category['id']; ?>"><?php echo $category['name']; ?></label>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>

                                        <!-- Price range filter -->
                                        <ul class="menu__filter-item"><i class="fa-solid fa-money-check-dollar"></i> Khoảng Giá
                                            <li><input type="number" name="min_price" placeholder="Từ &#8363;" min="0"></li>
                                            <li><input type="number" name="max_price" placeholder="Đến &#8363;" min="0"></li>
                                        </ul>
                                        
                                        <!-- Search term (will be transferred from main search box) -->
                                        <input type="hidden" name="search" id="advanced_search_term">
                                        <!-- Set advanced search flag to 1 -->
                                        <input type="hidden" name="advanced" value="1">
                                        
                                        <!-- Button -->
                                        <button type="submit" class="button-filter">Áp Dụng</button>
                                    </form>
                                </div>
                            </i>
                        </a>
                    </div>
                    <!-- HEADER__SEARCH-ICON -->
                    <div class="header__search-icon">
                        <!-- link -->
                        <a href="/web_bantrasua/myapp/user/Cart/store" class="header__search-icon-link">
                            <!-- icon cart -->
                            <i class="icon-cart fa-solid fa-cart-shopping"></i>
                        </a>
                        <!-- Icon-user-wrapper -->
                        <div class="icon-user-wrapper">
                            <i class="icon-user fa-regular fa-user"></i>
                            <!-- MENU__USER -->
                            <div class="menu__user">
                                <!-- item -->
                                <ul class="menu__user-item">
                                    <!-- item 1 -->
                                     <?php 
                                      if( isset($data['userData'])){
?>
<li class="menu__user-item-1">
                                        <!-- icon-login_1 -->
                                        <i class="icon-login_1 fa-regular fa-user"></i>
                                        <a href="#">Tên: <?php echo isset($data['userData']['username']) ? $data['userData']['username'] : (isset($data['userData']['name']) ? $data['userData']['name'] : 'Khách hàng'); ?></a>
                                    </li>
                                    <!-- item-2 -->
                                    <li class="menu__user-item-2">
                                        <!-- icon-login_2 -->
                                        <i class="icon-login_2 fa-solid fa-circle-info"></i>
                                        <a href = "/web_bantrasua/myapp/user/user/info">Thông Tin
                                            Cá Nhân</a>
                                    </li>
                                    <!-- item-3 -->
                                    <li class="menu__user-item-3">
                                        <!-- icon-login_3 -->
                                        <i class="icon-login_3 fa-solid fa-boxes-stacked"></i>
                                        <!-- <a onclick="handleLoadContent('purchase')">Đơn Mua</a> -->
                                        <a href="/web_bantrasua/myapp/user/Purchase/show">Đơn mua</a>
                                    </li>

                                    <!-- item 5 -->
                                    <li class="menu__user-item-5">
                                        <!-- icon-login_5 -->
                                        <i class="icon-login_5 fa-solid fa-right-to-bracket"></i>
                                        <a href="/web_bantrasua/myapp/user/auth/logout">Đăng Xuất</a>
                                    </li>
<?php
                                      }else{
?>
                                    <!-- item 5 -->
                                    <li class="menu__user-item-5">
                                        <!-- icon-login_5 -->
                                        <i class="icon-login_5 fa-solid fa-right-to-bracket"></i>
                                        <a href="/web_bantrasua/myapp/user/auth/login">Đăng Nhập</a>
                                    </li>
                                    <li class="menu__user-item-5">
                                        <!-- icon-login_5 -->
                                        <i class="icon-login_5 fa-solid fa-right-to-bracket"></i>
                                        <a href="/web_bantrasua/myapp/user/user/register">Đăng Ký</a>
                                    </li>
<?php
                                      }
                                     ?>
                                    
                                </ul>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- THANH NAVBAR -->
                <!-- Header__nav -->
                <div class="header__nav">
                    <!-- Header__nav-list -->
                    <li class=" header__nav-list">
                        <!-- Header__nav-item -->
                    <li class="header__nav-item">
                        <a onclick="handleLoadContent('logined-content')" class="header__nav-item">TRANG
                            CHỦ</a>
                    </li>
                    <li class="header__nav-item header__nav-item--has-product">SẢN PHẨM

                        <!-- Header__nav-item__product -->
                        <!-- MENU TRÀ SỮA -->
                        <div class="header__nav-item__product">
                            <div class="header__product">
                                <!-- Header__product-header -->
                                <!-- <header class="header__product-header">
                                    <h3>TRÀ SỮA</h3>
                                </header> -->

                                <?php foreach ($data['categories'] as $category): ?>

                                    <header>
                                        <!--sửa lại css khúc này dùm t nha-->
                                        <h3> <a href="/web_bantrasua/myapp/user/home/showProductByCategory/<?php echo $category['id']; ?>"
                                                class="header__product-header">
                                                <?php echo $category['name'] ?></a>
                                        </h3>
                                    </header>

                                    <ul class="header__product-list">

                                        <?php foreach ($data['products'] as $product): ?>

                                            <?php if ($product['category_id'] == $category['id']): ?>
                                                <li class="header__product-item">
                                                    <a href="/web_bantrasua/myapp/user/home/showProductByID/<?php echo $product['id']; ?>"
                                                        class="header__product-name-item">
                                                        <?php echo $product['name'] ?></a>
                                                </li>
                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    </ul>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </li>
                    <li class="header__nav-item">
                        <a onclick="handleLoadContent('aboutUs')" class="header__nav-item" id="content_user">VỀ CHÚNG
                            TÔI</a>
                    </li>
                    </li>
                </div>
            </div>
        </header>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- <main>
        <iframe width="100%" height="100%" id="content_user" src="/web_bantrasua/myapp/user/home/userContent?view=logined-content"></iframe>
        </main> -->


        <div class="slideShow">
            <div class="list-image">
                <img src="../../../old/assets/img/ảnh trang chủ 1.jpg" width="100%"
                    alt="">
                <img src="../../../old/assets/img/ảnh trang chủ 2.jpg" width="100%"
                    alt="">
                <img src="../../../old/assets/img/ảnh trang chủ 3.jpg" width="100%" alt="">
                <img src="../../../old/assets/img/ảnh trang chủ 4.jpg" width="100%"
                    alt="">
            </div>
        </div>

        <script src="../../../old/assets/handle/user/slideShow copy.js"></script>

        <!-- ẢNH GIỚI THIỆU Clover Tea -->
        <!-- CONTAINER -->
        <div class="container">

            <div class="column-layout">
                <div class="column-layout__header">
                    <h3>CLOVER-TEA HÀNH TRÌNH CHINH PHỤC PHONG VỊ MỚI</h3>
                    <p>Hành trình luôn bắt đầu từ việc chọn lựa nguyên liệu kỹ càng từ các vùng đất trù phú, cho đến
                        việc bảo quản, pha chế từ bàn tay nghệ nhân. Qua những nỗ lực không ngừng,CLOVER-TEA luôn
                        hướng đến những sản phẩm trà tinh túy nhất, không chỉ đáp ứng nhu cầu thưởng thức mà còn
                        nâng cao trải nghiệm của người tiêu dùng. Chúng tôi tin rằng, mỗi tách trà là một hành trình
                        khám phá hương vị và văn hóa, kết nối những tâm hồn yêu trà.</p>
                </div>
                <div class="column-layout__image">
                    <img src="../../../old/assets/img/ảnh giới thiệu của trang chủ.jpg" alt="">
                    <div class="decribe">
                        <h2>Clover Tea</h2>
                        <p>Taste the Joy in Every Bubble</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- SẢN PHẨM NỔI BẬT -->
        <!-- Best Seller -->
        <div class="BestSeller">
            <h2>Sản Phẩm Nổi Bật</h2>
            <!-- Img BestSeller -->
            <div class="Img__BestSeller">
                <!-- Form -->
                <?php foreach ($data['products'] as $index => $product): ?>
                    <?php
                        if($index==8){
                          break; 
                        }
                            ?>
                    <div class="product-form__form">
          <!-- Container -->
          <div class="product-form__container">
            <!-- Image -->
            <div class="product-form__image">
              <i class="product-form__image-icon fa-solid fa-clover"></i>
              <img src="/web_bantrasua/myapp/public/assets/img/<?php echo isset($product['image']) ? $product['image'] : 'h5-removebg-preview.png'; ?>" alt="<?php echo $product['name']; ?>" class="product-form__image-img">
            </div>
            <!-- Content -->
            <div class="product-form__content" style=" white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
              <h3 class="product-form__title" title="<?php echo $product['name']?>"><?php 
                // Hiển thị tên sản phẩm, nếu quá dài thì cắt ngắn
                $name = $product['name'];
                echo $name;
              ?></h3>
              <span class="product-form__cost"> <?php echo number_format($product['cost_default'], 0, ',', '.') . "\u{20AB}" ?></span>
            </div>
            <!-- Button -->
            <div class="product-form__buy">
              <a href="/web_bantrasua/myapp/user/order/viewProduct?id=<?php echo $product['id']; ?>" class="product-form__buy-btn">
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
            <button class="more">
                Xem thêm
            </button>
        </div>

        <!-- TIN TỨC VÀ KHUYẾN MÃI-->
        <!-- News -->
        <div class="news">
            <h3>Tin Tức & Khuyến Mãi</h3>
        </div>
        <!-- Status-->
        <div class="status">
            <!-- Status__bestseller -->
            <div class="status__bestseller">
                <!-- 1 -->
                <div class="status-form__form">
                    <!-- Container -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/ảnh ăn bánh và uống tra.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">💖 ĂN BÁNH UỐNG TRÀ, KỂ CHUYỆN ĐÔI TA 💖
                            </a></h3>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                 <!-- 2 -->

                <div class="status-form__form">
                    <!-- Content -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/anhNews7.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">CLOVER TEA CHÀO ĐÓN NGÀY THANH NIÊN 
                            </a></h3>
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                <div class="status-form__form">
                    <!-- Content -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/anhNewss1.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">TRI  HỘI VIÊN MUA 1 TẶNG 1
                            </a></h3>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div class="status-form__form">
                    <!-- Content -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/anhNews3.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">CLOVER TEA MỜI BẠN LY TRÀ SỮA
                            </a></h3>
                        </div>
                    </div>
                </div>
                <!-- 5 -->
                <div class="status-form__form">
                    <!-- Content -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/anhNews6.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">CHÀO BẠN MỚI - CLOVER TEA MỜI BẠN 1 LY TRÀ ĐÀO 
                            </a></h3>
                        </div>
                    </div>
                </div>
                <!-- 6 -->
                <div class="status-form__form">
                    <!-- Content -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/anhNews4.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">SẮC VIỆT TRÊN ÁO, VỊ VIỆT TRÊN TAY 
                            </a></h3>
                        </div>
                    </div>
                </div>
                    <!-- 7 -->
                <div class="status-form__form">
                    <!-- Content -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/anhNews2.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">NEW COLLECTION 2025 "TEA LATTE"
                            </a></h3>
                        </div>
                    </div>
                </div>
                        <!-- 8 -->
                <div class="status-form__form">
                    <!-- Content -->
                    <div class="status-form__container">

                        <!-- Image -->
                        <div class="status-form__image">
                            <img src="../../../old/assets/img/anhNews5.jpg"
                                alt="Trà Sữa Clover Tea" alt="Trà Sữa Clover Tea" class="status-form__image-img">
                        </div>

                        <!-- Content -->
                        <div class="status-form__content">
                            <a href="#">
                                <h3 class="status-form__title">COMBO SẴN SÀNG - NGÀY LỄ RỘN RÀNG
                            </a></h3>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Information -->
            <a href="#" class="status-more__information">Xem Thêm</a>
        </div>
        <footer>
            <!--FORM-CONTAINER  -->
            <div class="form-container">
                <!-- contact -->
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
                <!-- information -->
                <div class="form-container__information">
                    <p><span class="bolded">ĐỊA CHỈ</span></p>
                    <p> <i class="fa-solid fa-location-pin"></i> Địa chỉ: F1/63/T ấp 6, xã Vĩnh Lộc A, huyện Bình Chánh,
                        TP.Hồ Chí Minh</p>
                </div>
                <!-- rule -->
                <div class="form-container__rule">
                    <p><span class="bolded">ĐIỀU KHOẢN SỬ DỤNG</span></p>
                    <p><i class="fa-solid fa-shield"></i> Chính sách bảo mật thông tin</p>
                    <p><i class="fa-solid fa-cart-arrow-down"></i> Chính sách đặt hàng</p>
                </div>
            </div>
    </div>
    </footer>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>
    <script src="../../assets/handle/user/loadIframe.js"></script>
     <script>
        const handleLoadContent = (page) => {
                var iframe = document.getElementById('content_user');
                iframe.src = "/web_bantrasua/myapp/user/home/userContent?view="+page;
        }

        function check() {
            alert("Vui lòng đăng nhập để tiếp tục!!!");
        }
     </script>


</body>

</html>