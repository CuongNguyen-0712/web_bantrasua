<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Amin</title>
  <link rel="stylesheet" href="<?php echo ASSETS.'styles/style.css';?>" />
  <link rel="stylesheet" href="<?php echo ASSETS.'styles/admin/login.css';?>" />
</head>
<body>
  <div class="login-container">
    <h2>ADMIN LOGIN</h2>
    
    <form id="login-form" action="/web_bantrasua/myapp/admin/auth/handleLogin" method="POST">
      <input 
        type="text" 
        id="username" 
        name="email" 
        placeholder="Email" 
        required 
      />
      <input 
        type="password" 
        id="password" 
        name="adminPass" 
        placeholder="Mật khẩu" 
        required 
      />
      <button type="submit">Đăng nhập</button>
      <p id="error-message" class="error"></p>
      <?php if ( isset($_SESSION['error']) ): ?>
        <p style="color:red"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?> 
    <?php endif; ?>
    </form>
  </div>
</body>
</html>
