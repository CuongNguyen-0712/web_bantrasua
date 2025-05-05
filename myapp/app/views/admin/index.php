<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test thử</title>
</head>

<body>
    <!-- Lặp qua mảng hiển thị tài khoản -->
    <?php foreach ($accounts as $account): ?>
            <tr>
                <p>Username: <?= htmlspecialchars($account['username']) ?></p>
                <p>Email: <?= htmlspecialchars($account['email']) ?></p>
                <p>Password: <?= htmlspecialchars($account['password']) ?></p>
            </tr>
    <?php endforeach; ?>
    <button>
        <a href="index.php?url=home/home">
            Navigate
        </a>
    </button>
</body>

</html>