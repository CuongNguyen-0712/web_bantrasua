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
<<<<<<< HEAD:myapp/app/views/admin/index.php
        <tr>
            <p>Username: <?= $account->getUserName(); ?></p>
            <p>Email: <?= $account->getEmail(); ?></p>
            <p>Password: <?= $account->getPassWord(); ?></p>
        </tr>
=======
    <tr>
        <p>Username: <?= $account->getUserName(); ?></p>
        <p>Email: <?= $account->getEmail(); ?></p>
        <p>Password: <?= $account->getPassWord(); ?></p>
    </tr>
>>>>>>> 74dd076629cf0281bdfadcbcf387e3ab08abe55a:myapp/app/view/admin/index.php
    <?php endforeach; ?>
    <button>
        <a href="index.php?url=home/home">
            Navigate
        </a>
    </button>
</body>

</html>