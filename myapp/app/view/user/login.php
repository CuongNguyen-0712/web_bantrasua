<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css" />
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/login.css" />
  <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/styles/user/style.css" />
  <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png"/>
  <title>Clover Tea</title>
</head>

<body>
  <div class="login">
    <div class="login-form">
      <div class="login-form__container">
        <div class="login-form__header">    
          <a href="../../index.html" class="login-form__heading">
            <h3 class="login-form__heading">
              <span class="login-form__welcome"> Welcome to </span>
              Clover Tea
              <i class="login-form__heading-icon fa-solid fa-clover"></i>
            </h3>
          </a>
          <span class="login-form__title">Đăng nhập</span>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" class="login-form__form" method="post">
          <div class="login-form__group">
            <label for="emailid" class="login-form__label">Email hoặc số điện thoại:</label>
            <input type="text" name="email" id="emailid" class="login-form__input"
              placeholder="Nhập email hoặc số điện thoại của bạn" required />
          </div>

          <div class="login-form__group">
            <label for="passid" class="login-form__label">Mật khẩu:</label>
            <input type="password" name="pass" id="passid" class="login-form__input"
              placeholder="Nhập mật khẩu của bạn" required/>
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
            </div>
        </form>

        <div class="login-form__link">
          <a href="./dangKi copy.html" class="login-form__link-register login-form__link">
            Bạn chưa có tài khoản?
          </a>
        </div>
          <?php         
              if (isset($_SESSION['login_error'])) {
                  echo '<p style="color: red">Email hoặc mật khẩu đăng nhập không đúng</p>';
                  unset($_SESSION['login_error']);
              }
          ?>
      </div>
    </div>
  </div>
</body>

</html>