<!-- <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/admin/admin.css">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css" />
    <link rel="stylesheet"
        href="/web_bantrasua/myapp/lib/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css" />
    <title>My admin</title>
</head>

<body>
    <aside class="aside_admin active">
        <div class="heading_aside">
            <i class="fa-solid fa-clover"></i>
            <h1>Clover Tea</h1>
        </div>
        <div class="feature_admin">
            <button class="btn" onclick="handleLoadContent('product.php')">
                <i class="fa-solid fa-mug-saucer"></i>
                <span class="name">Sản phẩm</span>
            </button>
            <button class="btn" onclick="handleLoadContent('user.php')">
                <i class="fa-solid fa-users"></i>
                <span class="name">Người dùng</span>
            </button>
            <button class="btn" onclick="handleLoadContent('orders.php')">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="name">Hóa đơn</span>
            </button>
            <button class="btn" onclick="handleLoadContent('statistics.php')">
                <i class="fa-solid fa-magnifying-glass-chart"></i>
                <span class="name">Thống kê </span>
            </button>
            <button class="btn">
                <i class="fa-solid fa-gear"></i>
                <span class="name">Cài đặt</span>
            </button>
        </div>
        <div class="footer_aside">
            <button>
                <span>Gửi ý kiến phản hồi</span>
                <i class="fa-solid fa-comment"></i>
            </button>
        </div>
        <button class="close_aside">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </aside>
    <main class="main_admin active">
        <header class="header_admin">
            <div class="header_left">
                <i class="fa-solid fa-bars"></i>
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm" />
            </div>
            <div class="header_right">
                <i class="fa-regular fa-envelope"></i>
                <i class="fa-regular fa-bell"></i>
                <div class="admin_info">
                    <i class="fa-solid fa-user"></i>
                    <span>Admin</span>
                </div>
                <div class="admin_dropdown active">
                    <div class="dropdown_heading">
                        <img src="" alt="" />
                        <h4>CuongNguyen</h4>
                    </div>
                    <div class="admin_center">
                        <button onclick="handleLoadContent('adminInfo.html')">
                            <i class="fa-solid fa-info"></i>
                            <span>Thông tin</span>
                        </button>
                        <button>
                            <i class="fa-regular fa-bell"></i>
                            <span>Thông báo</span>
                        </button>
                        <button>
                            <i class="fa-regular fa-envelope"></i>
                            <span>Hộp thư</span>
                        </button>
                    </div>
                    <button>Đăng xuất</button>
                </div>
            </div>
        </header>
        <iframe id="content_admin"></iframe>
    </main>
</body>
<script src="/web_bantrasua/myapp/public/assets/js/admin/admin.js"></script>

</html> -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/admin.css'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
    <link rel="stylesheet"
        href="<?php echo ASSETS . 'icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css'; ?>" />
    <title>Admin</title>
</head>

<body>
    <aside class="aside_admin active">
        <div class="heading_aside">
            <i class="fa-solid fa-clover"></i>
            <h1>Clover Tea</h1>
        </div>
        <div class="feature_admin">
            <button class="btn" onclick="handleLoadContent('/web_bantrasua/myapp/admin/product/index')">
                <i class="fa-solid fa-mug-saucer"></i>
                <span class="name">Sản phẩm</span>
            </button>
            <button class="btn" onclick="handleLoadContent('user.php')">
                <i class="fa-solid fa-users"></i>
                <span class="name">Người dùng</span>
            </button>
            <button class="btn" onclick="handleLoadContent('/web_bantrasua/myapp/admin/order/index')">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="name">Hóa đơn</span>
            </button>
            <button class="btn" onclick="handleLoadContent('statistics.php')">
                <i class="fa-solid fa-magnifying-glass-chart"></i>
                <span class="name">Thống kê </span>
            </button>
            <button class="btn">
                <i class="fa-solid fa-gear"></i>
                <span class="name">Cài đặt</span>
            </button>
        </div>
        <div class="footer_aside">
            <button>
                <span>Gửi ý kiến phản hồi</span>
                <i class="fa-solid fa-comment"></i>
            </button>
        </div>
        <button class="close_aside">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </aside>
    <main class="main_admin active">
        <header class="header_admin">
            <div class="header_left">
                <i class="fa-solid fa-bars"></i>
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm" />
            </div>
            <div class="header_right">
                <i class="fa-regular fa-envelope"></i>
                <i class="fa-regular fa-bell"></i>
                <div class="admin_info">
                    <i class="fa-solid fa-user"></i>
                    <span>Admin</span>
                </div>
                <div class="admin_dropdown active">
                    <div class="dropdown_heading">
                        <img src="" alt="" />
                        <h4>CuongNguyen</h4>
                    </div>
                    <div class="admin_center">
                        <button onclick="handleLoadContent('adminInfo.html')">
                            <i class="fa-solid fa-info"></i>
                            <span>Thông tin</span>
                        </button>
                        <button>
                            <i class="fa-regular fa-bell"></i>
                            <span>Thông báo</span>
                        </button>
                        <button>
                            <i class="fa-regular fa-envelope"></i>
                            <span>Hộp thư</span>
                        </button>
                    </div>
                    <button>Đăng xuất</button>
                </div>
            </div>
        </header>
        <iframe id="content_admin"></iframe>
    </main>
</body>
<script src="<?php echo ASSETS . 'js/admin/admin.js'; ?>"></script>

</html>