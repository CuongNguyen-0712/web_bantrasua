<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/index.css'; ?>">
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
            <button
                class="btn <?= $_SERVER['REQUEST_URI'] == '/web_bantrasua/myapp/admin/home/product' ? 'active' : '' ?>"
                onclick="handleLoadContent('/web_bantrasua/myapp/admin/home/product')">
                <i class="fa-solid fa-mug-saucer"></i>
                <span class="name">Sản phẩm</span>
            </button>
            <button class="btn <?= $_SERVER['REQUEST_URI'] == '/web_bantrasua/myapp/admin/home/user' ? 'active' : '' ?>"
                onclick="handleLoadContent('/web_bantrasua/myapp/admin/home/user')">
                <i class="fa-solid fa-users"></i>
                <span class="name">Người dùng</span>
            </button>
            <button
                class="btn <?= $_SERVER['REQUEST_URI'] == '/web_bantrasua/myapp/admin/home/order' ? 'active' : '' ?>"
                onclick="handleLoadContent('/web_bantrasua/myapp/admin/home/order')">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="name">Hóa đơn</span>
            </button>
            <button
                class="btn <?= $_SERVER['REQUEST_URI'] == '/web_bantrasua/myapp/admin/home/statistics' ? 'active' : '' ?>"
                onclick="handleLoadContent('/web_bantrasua/myapp/admin/home/statistics')">
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
                        <h4>
                            <?= $_SESSION['user']['username']; ?>
                        </h4>
                    </div>
                    <div class="admin_center">
                        <button>
                            <a style="display: flex; text-decoration: none; color: #000; align-items: center; justify-content: flex-start; gap: 20px; padding: 0 10px"
                                href="/web_bantrasua/myapp/admin/home/index">
                                <i class="fa-solid fa-info"></i>
                                <span>Thông tin</span>
                            </a>
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
                    <button id="logout">
                        <a href="/web_bantrasua/myapp/admin/auth/logout">
                            Đăng xuất
                        </a>
                    </button>
                </div>
            </div>
        </header>
        <iframe id="content_admin" src="/web_bantrasua/myapp/admin/<?= $page; ?>/index"></iframe>
    </main>
</body>
<script src="<?php echo ASSETS . 'js/admin/admin.js'; ?>"></script>

</html>