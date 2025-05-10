<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="<?php echo ASSETS . 'icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/info.css'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>">
</head>

<body>
    <section class="admin_info_detail">
        <h1>Thông tin của quản trị viên</h1>
        <div class="basic_info">
            <div class="avatar">
                <img src="" alt="">
                <i class="fa-solid fa-camera"></i>
            </div>
            <div class="basic">
                <span><?= htmlspecialchars($info['username']) ?></span>
                <span>Quản trị viên</span>
                <span><?= htmlspecialchars($info['ward']) ?>, <?= htmlspecialchars($info['district']) ?>,
                    <?= htmlspecialchars($info['province']) ?></span>
            </div>
        </div>
        <form class="personal_info">
            <div class="heading">
                <h2>Thông tin cá nhân</h2>
            </div>
            <div class="content">
                <div class="info">
                    <span>Họ và tên</span>
                    <span><?= htmlspecialchars($info['username']) ?></span>
                </div>
                <div class="info">
                    <span>Địa chỉ email</span>
                    <span><?= htmlspecialchars($info['email']) ?></span>
                </div>
                <div class="info">
                    <span>Số điện thoại</span>
                    <span><?= htmlspecialchars($info['phone']) ?></span>
                </div>
                <div class="info">
                    <span>Quyền truy cập</span>
                    <span>Quản trị viên</span>
                </div>
            </div>
        </form>
        <div class="address_info">
            <div class="heading">
                <h2>Địa chỉ</h2>
            </div>
            <div class="content">
                <div class="info">
                    <span>Địa chỉ nhà</span>
                    <span><?= htmlspecialchars($info['street']) ?>, <?= htmlspecialchars($info['ward'],) ?>,
                        <?= htmlspecialchars($info['district']) ?>, <?= htmlspecialchars($info['province']) ?></span>
                </div>
            </div>
        </div>
    </section>
</body>

</html>