<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/product.css'; ?>">
  <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
  <link rel="stylesheet" href="<?php echo ASSETS . 'icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css'; ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</head>

<body>
  <div class="product-iframe">
    <div class="product-iframe-content">
      <iframe id="product-delete" src="del-box.html" frameborder="0" width="100%" height="100%"></iframe>
      <iframe id="product-change" src="product-change.html" frameborder="0" width="100%" height="100%"
        style="display: none;"></iframe>
      <iframe id="product-add" src="product-add.html" frameborder="0" width="100%" height="100%"></iframe>
    </div>
  </div>
  <div class="product-heading">
    <div>
      <h1>Quản lí sản phẩm</h1>
      <p>Xem và thao tác các sản phẩm của cửa hàng Clover Tea</p>
    </div>
    <button onclick="loadProduct('add')">
      <i class="bi bi-plus-circle"></i>
      Thêm sản phẩm
    </button>
  </div>
  <div class="product-table">
    <table>
      <thead>
        <tr>
          <th>STT</th>
          <th></th>
          <th>Tên sản phẩm</th>
          <th>Loại</th>
          <th>Giá tiền</th>
          <th>Ngày upload</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img src="/assets/img/h5-removebg-preview.png" alt="Trà sữa Clover" /></td>
          <td>Trà sữa Clover Tea</td>
          <td>Trà sữa</td>
          <td>59.000&#8363;</td>
          <td>25/2/2023</td>
          <td>
            <span class="product-table_feature" onclick="toggleOptions(event,this)">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <div class="product-table_feature-menu">
              <button onclick="loadProduct('change')">
                Change
                <i class="bi bi-wrench"></i>
              </button>
              <button onclick="loadProduct('delete')">
                Delete
                <i class="bi bi-trash3"></i>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="product-pagination">
    <span><b>5</b> trong số <b>39</b> sản phẩm</span>
    <div class="product-pagination_button">
      <button disabled>
        <i class="fa-solid fa-chevron-left"></i>
        Prev
      </button>
      <button>
        Next
        <i class="fa-solid fa-angle-right"></i>
      </button>
    </div>
  </div>
  <script src="/assets/handle/admin/product.js"></script>
</body>

</html>