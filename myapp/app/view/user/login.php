<!-- Kiểm tra thì thông qua đường dẫn: /web_bantrasua/myapp/user/auth/login -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/login.css" />
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/style.css" />
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png" />
    <title>CLOVER-TEA</title>
</head>

<body>
    <div class="login">
        <div class="login-form">
            <div class="login-form__container">
                <div class="login-form__header">
                    <!--chờ link lại-->
                    <a href="/web_bantrasua/myapp/user/auth/notLogin" class="login-form__heading">      
                        <h3 class="login-form__heading">
                            <span class="login-form__welcome"> Welcome to </span>
                            Clover Tea
                            <i class="login-form__heading-icon fa-solid fa-clover"></i>
                        </h3>
                    </a>
                    <span class="login-form__title">Đăng nhập</span>
                </div>
                <!-- Đây là phần action cơ bản dẫn theo url lần lượt là phân quyền/controller/method, thống nhất cách này cho đơn giản, cách khác lỗi ráng chịu -->
                <form action="/web_bantrasua/myapp/user/auth/handleLogin" class="login-form__form" method="POST">
                    <div class="login-form__group">
                        <label for="emailid" class="login-form__label">Email:</label>
                        <input type="text" name="email" id="emailid" class="login-form__input"
                            placeholder="Nhập email của bạn" required/>
                    </div>

                    <div class="login-form__group">
                        <label for="passid" class="login-form__label">Mật khẩu:</label>
                        <input type="password" name="pass" id="passid" class="login-form__input"
                            placeholder="Nhập mật khẩu của bạn"  required/>
                        <div class="login-form__hidden-icon">
                            <i class="login-form__icon fa-solid fa-eye"></i>
                        </div>
                    </div>

                    <div class="login-form__forgot">       
                        Quên mật khẩu?
                    </div>

                    <div class="login-form__button">
                        <button class="login-form__btn" type="submit" name="submitType" value="ĐĂNG NHẬP">
                            Đăng nhập
                        </button>
                </form>

                <div class="login-form__link">
                    <!--chờ link lại-->
                    <a href="/web_bantrasua/myapp/user/User/register" class="login-form__link-register login-form__link">        
                        Bạn chưa có tài khoản?
                    </a>
                </div>
                <?php         
                    if (isset($_SESSION['error'])) {
                        echo '<p style="color: red; padding-top: 10px; text-align: center"> Email hoặc mật khẩu không hợp lệ</p>';
                        unset($_SESSION['error']);
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>