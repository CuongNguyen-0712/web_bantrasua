<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/thongtincanhan
    copy.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Thông Tin Cá Nhân</title>
    <link rel="icon" type="image/x-icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/font/Arimo-VariableFont_wght.ttf">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
<style>

.html, body {
    font-family: Arimo, sans-serif;
    font-size: 14px;
    line-height: 1.5;
    color: rgb(2, 108, 61);
}

.form__error ul, .form__success {
    padding: 10px;
    border-radius: 5px;
    width: 90%;
}
.form__error ul {
    background: #ffe6e6;
    border: 1px solid #ff6666;
}
.form__success {
    background: #e6ffee;
    border: 1px solid #33cc99;
}

.modal {
    display: flex;
    width: 100%;
    height: 100%;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    flex-wrap: wrap;
    position: fixed;
}

.modal__over-lay {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: white;
}

.modal__body {
    width: 70%;
    height: 70vh;
    display: flex;
    background-color: white;
    border-radius: 10px;
    margin: auto;
    margin-top: 5%;
    position: relative;
    border: 1px solid rgb(190, 188, 188);
    flex-direction: column;
    flex-wrap: wrap;
}

h2 {
    margin-left: 5%;
}

.modal__content {
    display: flex;
    width: 20%;
    height: 30vh;
    font-size: 15px;
    text-decoration: none;
    background-color: white;
    border-radius: 10px;
    margin: auto;
    margin-top: 5%;
    margin-right: 0px;
    position: relative;
    border: 1px solid rgb(190, 188, 188);
    flex-direction: column;
    flex-wrap: wrap;
}

.form__menu {
    min-width: 90px;
}

/* SIDEBAR */
.sidebar {
    list-style-type: none; 
    padding: 0;
    margin: 0;
    background-color: #fff;
    border-radius: 10px;
}

.sidebar li {
    display: flex; 
    justify-content: space-between;
    align-items: center; 
    padding: 12px 16px;
    margin-top: 5px;
    border-bottom: 1px solid #eaeaea;
}

.sidebar li:last-child {
    border-bottom: none;
}

.sidebar a {
    display: flex; 
    align-items: center;
    text-decoration: none; 
    color: #333;
    width: 100%;
}

.sidebar__item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 16px;
    flex-grow: 1; 
}

.icon-right {
    font-size: 14px;
    color: #aaa;
}

.sidebar li:hover {
    opacity: 0.8;
}

.icon-identify {
    color: rgb(2, 108, 61);
}

/* FORM */
.Information__group {
    flex-direction: column;
    max-width: auto;
    padding: 10px;
    margin: 20px;
    flex-wrap: wrap;
    position: fixed;
}

.form__info {
    display: inline-flex;
    padding: 10px 0;
}

.form__label {    
    min-width: 130px;
    margin-left: 25px;
    color: #888;
    font-weight: 500;
}

.form__input {
    width: 300px;
    height: 36px;
    color: #333;
    border: 1px solid #b4b4b4;
    border-radius: 5px;
    box-sizing: border-box;
}

.form__input:hover {
    border: 1px solid #505050;
}

input[type="date"] {
    min-width: 28.7%;
    font-size: 14px;
    border: 1px solid #b4b4b4;
    border-radius: 5px;
    box-sizing: border-box;
}

.save {
    width: 120px;
    height: 30px;
    background-color: rgb(2, 108, 61);
    font-size: 12px;
    font-weight: 600;
    color: aliceblue;
    outline: none;
    border: none;
    margin-top: 30px;
    margin-left: 80%;
    border-radius: 5px;
}
.save:hover {
    font-weight: 500;
}

</style>
</head>
<body>
    <div class="modal">
        <div class="modal__over-lay"></div>

        <!-- SIDEBAR -->
        <div class="modal__content">
            <ul class="sidebar">
                <li>
                    <a href="#">
                        <span class="sidebar__item">
                            <i class="icon-identify fa-solid fa-id-card"></i> Thông tin cá nhân
                        </span>
                        <i class="icon-right fa-solid fa-chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidebar__item">
                            <i class="icon-identify fa-solid fa-id-card"></i> Khách Hàng Thành Viên
                        </span>
                        <i class="icon-right fa-solid fa-chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="./purchase.html">
                        <span class="sidebar__item">
                            <i class="icon-identify fa-solid fa-cart-shopping"></i> Đơn Mua
                        </span>
                        <i class="icon-right fa-solid fa-chevron-right"></i>
                    </a>
                </li>
                <li>
         
                    <a href="/index.html" target="_top">
                        <span class="sidebar__item">
                            <i class="icon-identify fa-solid fa-arrow-right-from-bracket"></i> Đăng Xuất
                        </span>
                        <i class="icon-right fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>


        <!-- FORM THÔNG TIN -->
        <div class="modal__body">
            <div class="modal__inner">
                <div class="Information">
                    <h2>Thông tin cá nhân</h2>
                    <div class="Information__group">
                        <?php
                        $errors = $_SESSION['errors'] ?? [];
                        $success = $_SESSION['success'] ?? '';
                        $old = $_SESSION['old'] ?? [];
                        $oldUserAddress = $_SESSION['userAddress'] ?? [];
                        ?>

                        <?php if (!empty($errors)): ?>
                                    <div class="form__error">
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                        <li><?= htmlspecialchars($error) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                        <?php endif; ?>

                        <?php if (!empty($success)): ?>
                                    <div class="form__success">
                                        <?= htmlspecialchars($success) ?>
                                    </div>
                        <?php endif; ?>

                        <?php unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['old']); ?>

                        <form action="/web_bantrasua/myapp/user/user/save" method="POST" class="form">
                            <div class="form__info">
                                <label class="form__label" for="name">Họ & Tên</label>
                                <input class="form__input" name="username" type="text" id="username" placeholder="Hoàng Mạnh Hà"
                                    value="<?= htmlspecialchars($old['username'] ?? '') ?>">

                                <label class="form__label" for="number">Số Điện Thoại</label>
                                <input class="form__input" name="phone_number" type="text" id="number" placeholder="0345621117"
                                    value="<?= htmlspecialchars($old['phone_number'] ?? '') ?>">
                            </div>

                            <div class="form__info">
                                <label class="form__label" for="email">Email</label>
                                <input class="form__input" name="email" type="email" id="email" placeholder="hmha@sgu.edu.vn"
                                    value="<?= htmlspecialchars($old['email'] ?? '') ?>">

                                <label class="form__label" for="district">Quận/Huyện</label>
                                <input type="text" name="district" class="form__input"
                                    value="<?= htmlspecialchars($oldUserAddress['district'] ?? '') ?>">
                            </div>

                            <div class="form__info">
                                <label class="form__label" for="province">Tỉnh/Thành Phố</label>
                                <input type="text" name="province" class="form__input"
                                    value="<?= htmlspecialchars($oldUserAddress['province'] ?? '') ?>">

                                <label class="form__label" for="street">Địa chỉ</label>
                                <input class="form__input" name="street" type="text" id="street"
                                    value="<?= htmlspecialchars($oldUserAddress['street'] ?? '') ?>">
                            </div>

                            <div class="form__info">
                                <label class="form__label" for="ward">Phường/Xã</label>
                                <input class="form__input" name="ward" type="text" id="ward"
                                    value="<?= htmlspecialchars($oldUserAddress['ward'] ?? '') ?>">
                            </div>

                            <button type="submit" class="save">Lưu Thay Đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>