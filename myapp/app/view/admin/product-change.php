<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/iframe.css'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
</head>

<body>
    <div class="header">
        <h2>Sửa sản phẩm</h2>
    </div>
    <div class="content">
        <form action="/web_bantrasua/myapp/admin/product/update/<?= $product['id'] ?>" method="POST"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Tên sản phẩm</label>
                <input type="text" name="name" id="productName" value="<?= htmlspecialchars($product['name']) ?>"
                    required />
            </div>
            <div class="form-group">
                <label for="productCategory">Loại</label>
                <select name="category" required>
                    <option value="">-- Chọn loại --</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"
                        <?= ($product['category_id'] == $category['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="productPrice">Giá</label>
                <input type="number" name="price" value="<?= htmlspecialchars($product['cost_default']) ?>" required />
            </div>

            <div class="form-group">
                <label>Giá theo size</label>
                <?php foreach ($sizes as $size):
                    $priceSize = $productSizes[$size['id']] ?? ''; ?>
                <div style="margin-bottom: 10px;">
                    <label for="price_size_<?= $size['id'] ?>">Size <?= htmlspecialchars($size['name']) ?>:</label>
                    <input type="number" name="prices[<?= $size['id'] ?>]" value="<?= htmlspecialchars($priceSize) ?>"
                        required />
                </div>
                <?php endforeach; ?>
            </div>

            <div class="form-group">
                <label for="productStatus">Trạng thái</label>
                <select name="active" required>
                    <option value="1" <?= ($product['is_active'] == 1) ? 'selected' : '' ?>>Hiện</option>
                    <option value="0" <?= ($product['is_active'] == 0) ? 'selected' : '' ?>>Ẩn</option>
                </select>
            </div>

            <div class="form-group">
                <label for="productDescription">Mô tả</label>
                <textarea name="description" rows="4"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="productImage">Hình ảnh sản phẩm</label>
                <input type="file" name="image" id="productImage" accept="image/*" />
            </div>

            <div class="image-preview" id="imagePreview" <?= $product['img'] ? '' : 'style="display:none;"' ?>>
                <img src="<?= $product['img'] ?>" alt="Hình sản phẩm" id="previewImg" />
                <button type="button" class="delete-image-button" onclick="removePreview()">Xóa hình</button>
            </div>

            <input type="hidden" name="current_image" value="<?= $product['img'] ?? '' ?>" />
            <input type="hidden" name="remove_image" id="removeImageFlag" value="0" />


            <div class="footer" style="justify-content: flex-end; gap: 5px;">
                <button type="button" class="save-button" onclick="window.history.back()">Hủy</button>
                <button type="submit" class="save-button" style="background-color: #ff1a1a;">Lưu</button>
            </div>
        </form>
    </div>
    <script src="<?php echo ASSETS . 'js/admin/product.js'; ?>"></script>
</body>

</html>