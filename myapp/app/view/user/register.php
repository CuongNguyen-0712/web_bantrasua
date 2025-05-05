<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" href="/assets/styles/user/dangKi copy.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Đăng Kí</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/logo.png">
    <link href="/assets/font/Arimo-VariableFont_wght.ttf" rel="stylesheet">
    <link rel="stylesheet" href="/assets/icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css">
    <style>
        /* Modal */
.html,body{
    font-family: Arimo, sans-serif;
    font-size: 14px;
    line-height: 1.5;
    color: rgb(2, 108, 61);
    overflow: hidden;
}
body{
    width: 100%;
    height: 100vh; 
    background-image: url(https://katinat.vn/wp-content/uploads/2023/12/KAT_NEWBRANDING_COVERFB_3-scaled.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}
/*  BACKGROUND MỜ ĐEN CHỦ ĐẠO */

.modal__over-lay {
    position: fixed; 
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1;
}
.modal__over-lay img {
    width: 100%; 
    height: 100%; 
    background-color: rgba(0, 0, 0, 0.9);
    z-index: 1;
    object-fit: cover; 
}

/* BACKGROUND ĐĂNG KÝ */
.modal{
    position:fixed ;
    top: 0;
    left: 0;
    bottom: 0;
    display: flex;
    z-index: 2;
}

.modal__body{
    background-color: rgba(207, 206, 206, 0.8);
    border-radius: 5px;
    margin: auto;
    position: relative;
    z-index: 2;
}
/* ĐĂNG ký */
.auth-form{
    margin-top: 100px;
    padding: 0 32px;
    width: 550px;
    height: 100vh;
}

.auth-form__header{
    justify-content: center;
    align-items: center;
    text-align: center; 
}

/* CSS TEXT ĐĂNG KÝ  */
.auth-form__heading{
    margin-top: 3px;
    font-size: 18px;
    text-decoration: none;
}

.auth-form__heading h3{
    font-weight: 600;
}



/* THẺ TIÊU ĐỀ CLOVER */
.auth-form__welcome{
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 10%;
    height: auto;
    font-weight: 400;
    font-size: 20px;
}

.strong{
    font-weight:bolder;
}
/* CSS ICON CLOVER */
.icon{
    rotate: 35deg;
}

/* CSS  TEXT BẠN ĐÃ CÓ TÀI KHOẢN */
.auth-form__switch-btn{
    color: #9c9b9b;
    cursor: pointer;
    font-size: 16px;
    text-decoration:none ;
    font-weight: 500;
    color: rgba(2, 108, 61, 0.8);
}
/* CSS ĐĂNG NHẬP  */
.auth-form__switch-btn-link{
    text-decoration:none ;
    font-weight: 100;
    color: rgba(2, 108, 61, 0.8);
}
.auth-form__switch-btn-link:hover{
    opacity: 0.6;
}

/* CSS TEXT INPUT */

/* CSS TIÊU ĐỀ CỦA INPUT */
.auth-form__title{
    font-weight: bolder;
    font-size: 17px;
}

/* CSS CÁC Ô INPUT */
.auth-form__input{
    width:95%;
    height: 30px;
    color:#cfc7c7;
    margin-top: 10px;
    margin-bottom: 10px;
    padding: 0 12px;
    font-size: 14px;
    border: 1px solid #a5a4a4;
    border-radius: 5px;
    margin-right: 32px;
    outline: none;
}
.auth-form__input:focus{
    border-color: #888;
}

/* CSS DÒNG CHẤP NHẬN ĐIỀU KHOẢN */
.auth-form__aside{
    font-size: 16px;
}

/* CSS DÒNG KHÁCH HÀNG ĐĂNG KÍ TRỞ THÀNH.... */
.auth-form__policy-text-link{
    color: rgba(2, 108, 61, 0.8);
    font-weight: 300;
}

.auth-form__check-box{
    color: #545252;
    text-decoration:  rgba(2, 108, 61, 0.8);
}
.auth-form__check-box:hover{
    opacity: 0.7;
}

/* CSS NÚT BUTTON  */
.auth-form__controls{
    text-decoration: none;
}
.btn{
    background-color: rgb(2, 108, 61);
    height: 35px;
    width: 100%;
    padding: 3px px;
    color:white;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    margin: 20px auto;
    display: block;
}
.btn-link{
    text-decoration:none;
}
.btn:hover{
    opacity: 0.8;
  
}

.error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
 }

 .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
 }


    </style>

</head>
<body>


<div class="modal">
    <div class="modal__over-lay"></div>
    <div class="modal__body">
        <div class="modal__inner">
            <form action="index.php?url=user/register" method="post" class="auth-form">
                <div class="auth-form__header">
                    <div class="auth-form__welcome">
                        <span class="auth-form-heading">Welcome to 
                            <a href="/index.html" style="text-decoration: none; color: rgb(2, 108,61)"> 
                                <strong>Clover Tea</strong>
                                <i class="icon fa-solid fa-clover"></i>
                            </a>
                        </span>
                    </div>
                    <h3 class="auth-form__heading">Đăng Ký</h3>

                    <?php if (!empty($error)): ?>
                                <div class="error-message"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <?php if (!empty($_SESSION['success'])): ?>
                            <script>
                                alert("<?= addslashes($_SESSION['success']) ?>");
                            </script>
                            <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                    

                    <span class="auth-form__switch-btn">Bạn đã có tài khoản?
                        <a href="/user/login" class="auth-form__switch-btn-link">Đăng nhập</a>
                    </span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <span class="auth-form__title">Nhập tài khoản đăng nhập:</span>
                        <input type="text" name="username" class="auth-form__input" placeholder="Nhập họ tên" required>
                    </div>
                    <div class="auth-form__group">
                        <span class="auth-form__title">Nhập email:</span>
                        <input type="email" name="email" class="auth-form__input" placeholder="Nhập email" required>
                    </div>
                    <div class="auth-form__group">
                        <span class="auth-form__title">Nhập mật khẩu:</span>
                        <input type="password" name="password" class="auth-form__input" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="auth-form__group">
                        <span class="auth-form__title">Nhập lại mật khẩu:</span>
                        <input type="password" name="confirm_password" class="auth-form__input" placeholder="Nhập lại mật khẩu" required>
                    </div>
                </div>

                <div class="auth-form__aside">
    <a href="#" class="auth-form__policy-text-link">Chấp nhận điều khoản: </a>
    <p class="auth-form__check-box">
        <input type="checkbox" id="member" name="is_member" value="1">
        <label for="member">Khách hàng đăng kí trở thành Hội Viên Clover Tea</label>
    </p>
</div>


                <div class="auth-form__controls">
                    <button type="submit" class="btn">ĐĂNG KÝ</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
    