<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="stylesheet" href="/assets/styles/admin/iframe.css">
</head>

<body>
    <div class="header">
        <h2>Thêm sản phẩm</h2>
    </div>
    <div class="content">
        <form>
            <div class="form-group">
                <label for="productId">ID</label>
                <input type="text" id="productId" value="65000094" disabled />
            </div>

            <div class="form-group">
                <label for="productName">Tên sản phẩm</label>
                <input type="text" id="productName" />
            </div>
            <div class="form-group">
                <label for="productCategory">Loại</label>
                <select id="productCategory">
                    <option>Loại</option>
                    <option>Trà sữa</option>
                    <option>Trà</option>
                    <option>Coffee</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productPrice">Giá</label>
                <input type="text" id="productPrice" />
            </div>

            <div class="form-group">
                <label for="productDescription">Mô tả</label>
                <textarea id="productDescription" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="dateUpload">Ngày upload</label>
                <input type="date" id="date" />
            </div>
            <div class="form-group">
                <label for="productImage">Hình ảnh sản phẩm</label>
                <input type="file" id="productImage" />
            </div>
            <div class="image-preview">
                <img src="" alt="Hình sản phẩm" />
                <button type="button" class="delete-image-button">Xóa hình</button>
            </div>
        </form>
    </div>
    <div class="footer" style="justify-content: flex-end; gap: 5px;">
        <button class="save-button" onclick="closeProduct()" >Hủy</button>
        <button class="save-button" onclick="closeProduct()" style="background-color: #ff1a1a;" >Lưu</button>
    </div>
    <script>
        function closeProduct() {
            window.parent.postMessage("closeProduct", "*");
        }
    </script>
</body>

</html>