<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test thử</title>
</head>

<body>
    <?php foreach ($accounts as $account): ?>
        <tr>
            <p>Username: <?= $account->getUserName(); ?></p>
            <p>Email: <?= $account->getEmail(); ?></p>
            <p>Password: <?= $account->getPassWord(); ?></p>
        </tr>
    <?php endforeach; ?>
    <button>
        <a href="index.php?url=home/home">
            Navigate
        </a>
    </button>
</body>

</html>