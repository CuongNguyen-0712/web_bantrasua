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
        <form action="/web_bantrasua/myapp/admin/product/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Tên sản phẩm</label>
                <input type="text" name="name" required />
            </div>
            <div class="form-group">
                <label for="productCategory">Loại</label>
                <select name="category" required>
                    <option value="">-- Chọn loại --</option>
                    <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['name'] ?>">
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="productPrice">Giá treo</label>
                <input type="number" name="price" required />
            </div>

            <div class="form-group">
                <label>Giá theo size</label>
                <?php foreach ($sizes as $size): ?>
                <div style="margin-bottom: 10px;">
                    <label for="price_size_<?= $size['id'] ?>">Size <?= htmlspecialchars($size['name']) ?>:</label>
                    <input type="number" name="prices[<?= $size['id'] ?>]" id="price_size_<?= $size['id'] ?>"
                        required />
                </div>
                <?php endforeach; ?>
            </div>

            <div class="form-group">
                <label for="productDescription">Mô tả</label>
                <textarea name="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="productImage">Hình ảnh sản phẩm</label>
                <input type="file" name="image" id="productImage" accept="image/*" />
            </div>
            <div class="image-preview" id="imagePreview" style="display:none;">
                <img src="" alt="Hình sản phẩm" id="previewImg" />
                <button type="button" class="delete-image-button" onclick="removePreview()">Xóa hình</button>
            </div>
            <div class="footer" style="justify-content: flex-end; gap: 5px;">
                <button type="button" class="save-button" onclick="window.history.back()">Hủy</button>
                <button type="submit" class="save-button" style="background-color: #ff1a1a;">Lưu</button>
            </div>
        </form>
    </div>
    <script src="<?php echo ASSETS . 'js/admin/product.js'; ?>"></script>
</body>

</html>