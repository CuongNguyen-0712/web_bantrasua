<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/iframe.css'; ?>">
  <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />

  <title>Hộp thoại xóa</title>
</head>

<body>
  <style>
    body {
      margin-top: 20%;
      overflow: hidden;
    }

    .confirm-dialog {
      text-align: center;
      background: #fff;
      padding: 20px 30px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
    }

    .confirm-dialog h2 {
      font-size: 18px;
      margin: 0 0 15px;
      color: #333;
    }
  </style>
  </head>

  <body>
    <form action="/web_bantrasua/myapp/admin/topping/delete/<?= $toppingId ?>" method="POST">
      <div class="confirm-dialog">
        <h2>Bạn có chắc chắn muốn xóa topping này vĩnh viễn không ?</h2>
        <div class="footer" style="gap: 10px;">
          <button onclick="window.history.back()">Hủy</button>
          <button type="submit" name="confirm" style="background-color: #ff1a1a;">Xóa</button>
    </form>
    </div>
    </div>
  </body>

</html>