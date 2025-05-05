<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            padding-top: 50px;
        }

        .success-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .success-container h2 {
            color: #28a745;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .success-container ul li {
            background: #f8f9fa;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 5px solid #28a745;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="success-container text-center">
    <h2 class="text-success">Cảm ơn bạn đã đặt hàng!</h2>
    <p class="mb-3">Đơn hàng của bạn đã được ghi nhận và đang được xử lý.</p>

    <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($_GET['id']) ?></p>

    <h5 class="mt-4 mb-2">Chi tiết đơn hàng:</h5>
    <ul class="text-start list-group mb-4">
        <?php foreach ($details as $item): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($item['name']) ?></strong> 
                        (Size: <?= $item['size'] ?>) - SL: <?= $item['quantity'] ?> - 
                        Giá: <?= number_format($item['price'], 0, ',', '.') ?>đ
                    </li>
        <?php endforeach; ?>
    </ul>

    <p>Chúng tôi sẽ liên hệ với bạn để xác nhận và giao hàng trong thời gian sớm nhất.</p>
    <p>Chúc bạn có một trải nghiệm mua sắm tuyệt vời cùng chúng tôi!</p>

    <a href="index.php" class="btn btn-primary mt-3">🛍 Quay lại trang chủ</a>
</div>

</body>
</html>
