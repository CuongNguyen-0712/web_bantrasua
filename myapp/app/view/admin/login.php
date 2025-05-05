<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\web_bantrasua\myapp\public\assets\styles\admin\login.css">
    <link rel="stylesheet" href="\web_bantrasua\myapp\public\assets\styles\style.css">
    <link rel="stylesheet"
        href="\web_bantrasua\myapp\public\assets\icon\fontawesome-free-6.6.0-web\fontawesome-free-6.6.0-web\css\all.min.css">
    <title>Login Admin</title>
</head>

<body>
    <form class="login-form" action="/web_bantrasua/myapp/admin/auth/handleLogin" method="POST">
        <div class="admin-heading">
            <h2>
                <i class="fa-solid fa-clover" style="transform: rotate(-45deg);"></i>
                Quản trị viên của Clover Tea
            </h2>
            <p>
                Vui lòng đăng nhập để tiếp tục
            </p>
        </div>
        <div class="admin-container">
            <div class="admin-input">
                <label for="username">Tên đăng nhập</label>
                <input type="text" name="username" placeholder="Email hoặc số điện thoại">
            </div>
            <div class="admin-input">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" placeholder="Mật khẩu">
            </div>
        </div>
        <div class="admin-footer">
            <button type="submit">
                Đăng nhập
            </button>
        </div>
    </form>
    <?php
    if (isset($_SESSION['error'])) {
        echo "
            <div class='box-message' style='display: flex;align-items: center; height: 50px; width: max-content; position: absolute; top: 10px; right: 10px; background: red; padding: 0 20px; border-radius: 10px;'>
            <p class='error-message' style='color: #fff; text-transform: uppercase; font-weight: 600; font-size: 12px'>" . $_SESSION['error'] . "</p>
            </div>";
        unset($_SESSION['error']);
    }
    ?>
</body>

<script>
const checkError = document.querySelector('.box-message');
if (checkError) {
    setTimeout(() => {
        checkError.remove();
    }, 3000)
}
</script>

</html>