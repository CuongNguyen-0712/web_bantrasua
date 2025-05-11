<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/product.css'; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
    <link rel="stylesheet"
        href="<?php echo ASSETS . 'icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css'; ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</head>

<body>
    <div class="product-heading">
        <div>
            <h1>Quản lí sản phẩm</h1>
            <p>Xem và thao tác các sản phẩm và topping của cửa hàng Clover Tea</p>
            <div class="product-pagination_button">
                <a href="/web_bantrasua/myapp/admin/product/index">Sản phẩm</a>
                <a href="/web_bantrasua/myapp/admin/topping/index">Topping</a>
            </div>
        </div>
        <div class="product-pagination_button">
            <a href="/web_bantrasua/myapp/admin/product/add">
                <i class="bi bi-plus-circle"></i>
                Thêm sản phẩm
            </a>
        </div>
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
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $index => $product): ?>
                        <tr>
                            <td><?= $offset + $index + 1 ?></td>
                            <td><img src="<?= $product['img'] ?>" alt="Hình sản phẩm" />
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['category']) ?></td>
                            <td><?= number_format($product['cost_default']) ?>₫</td>
                            <td><?= date('d/m/Y', strtotime($product['upload_time'])) ?></td>
                            <td><?= $product['is_active'] == 1 ? 'Hiện' : 'Ẩn' ?></td>
                            <td>
                                <span class="product-table_feature" onclick="toggleOptions(event,this)">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <div class="product-table_feature-menu">
                                    <a href="/web_bantrasua/myapp/admin/product/edit/<?= $product['id'] ?>">
                                        Change
                                        <i class="bi bi-wrench"></i>
                                    </a>
                                    <a href="/web_bantrasua/myapp/admin/product/delete/<?= $product['id'] ?>">
                                        Delete
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">KHÔNG CÓ SẢN PHẨM NÀO !!.</td>
                        <?php $index = -1; ?>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="product-pagination">
        <span><b><?= $offset + $index + 1 ?></b> trong số <b><?= $totalProducts ?></b> sản phẩm</span>
        <div class="product-pagination_button">
            <?php
            $baseQuery = [
                'controller' => 'product',
                'action' => 'index',
            ];
            ?>
            <?php if ($currentPage > 1): ?>
                <?php
                $prevQuery = array_merge($baseQuery, ['page' => $currentPage - 1]);
                ?>
                <a href="?<?= http_build_query($prevQuery) ?>">
                    <i class="fa-solid fa-chevron-left"></i> Prev
                </a>
            <?php endif; ?>

            <?php if ($currentPage < $totalPages): ?>
                <?php
                $nextQuery = array_merge($baseQuery, ['page' => $currentPage + 1]);
                ?>
                <a href="?<?= http_build_query($nextQuery) ?>">
                    Next <i class="fa-solid fa-angle-right"></i>
                </a>
            <?php endif; ?>
        </div>
        <script src="<?php echo ASSETS . 'js/admin/product.js'; ?>"></script>
</body>

</html>