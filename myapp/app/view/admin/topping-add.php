<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/iframe.css'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
</head>

<body>
    <div class="header">
        <h2>Thêm sản phẩm</h2>
    </div>
    <div class="content">
        <form action="/web_bantrasua/myapp/admin/topping/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Tên topping</label>
                <input type="text" name="name" required />
            </div>
            <div class="form-group">
                <label for="productPrice">Giá</label>
                <input type="number" name="cost" required />
            </div>

            <div class="footer" style="justify-content: flex-end; gap: 5px;">
                <button type="button" class="save-button" onclick="window.history.back()">Hủy</button>
                <button type="submit" class="save-button" style="background-color: #ff1a1a;">Lưu</button>
            </div>
        </form>
    </div>
</body>

</html>