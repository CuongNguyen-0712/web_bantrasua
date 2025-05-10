<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
        href="<?php echo ASSETS . 'icon/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.min.css'; ?>" />
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/admin/user.css'; ?>  " />
    <link rel="stylesheet" href="<?php echo ASSETS . 'styles/style.css'; ?>" />
</head>
<section class="section_user">
    <div class="div_heading">
        <h1>Quản lí người dùng</h1>
        <span>Xem những tài khoản hiện tại và bắt đầu thao tác</span>
    </div>
    <button
        style="display: flex; position: absolute; height: 40px; width: 150px; top: 20px; right: 20px; border-radius: 10px; background: rgb(2 108 61); color: #fff; align-items: center; justify-content: center; gap: 10px;"
        onclick="handleShowFormAdd()">
        <span>Thêm</span>
        <i class="fa-solid fa-user-plus"></i>
    </button>
    <ul class="table_user">
        <li>
            <span>STT</span>
            <span>Họ và tên</span>
            <span>Email</span>
            <span>Số điện thoại</span>
            <span>Mật khẩu</span>
            <span>Ngày tạo</span>
            <div class="feature"></div>
        </li>
        <?php foreach ($users as $index => $user): ?>
        <li>
            <span>
                <?= $offset + $index + 1 ?>
            </span>
            <span>
                <?= htmlspecialchars($user['username']) ?>
            </span>
            <span>
                <?= htmlspecialchars($user['email']) ?>
            </span>
            <span>
                <?= htmlspecialchars($user['phone_number']) ?>
            </span>
            <span>
                <?= htmlspecialchars($user['password']) ?>
            </span>
            <span>
                <?= date('d/m/Y', strtotime($user['create_time'])) ?>
            </span>
            <span>
                <i
                    class="<?= htmlspecialchars($user['status']) == 0 ? 'fa-solid fa-lock' : 'fa-solid fa-unlock' ?>"></i>
            </span>
            <div class="feature">
                <i class="fa-solid fa-ellipsis"></i>
                <div class="dropdown">
                    <button data-id="<?= $user['id'] ?>" data-status=<?= $user['status'] == '1' ? '0' : '1' ?>
                        id="lockBtn" onclick="handleShowFormLock(this)">
                        <span>
                            <?= $user['status'] == 1 ? 'Khóa' : 'Mở' ?>
                        </span>
                        <i class=<?= $user['status'] == 0 ? '"fa-solid fa-unlock"' : '"fa-solid fa-lock"' ?>></i>
                    </button>
                    <button data-id="<?= $user['id'] ?>" data-name="<?= $user['username'] ?>"
                        data-email="<?= $user['email'] ?>" data-phone="<?= $user['phone_number'] ?>"
                        onclick="handleShowFormModify(this)">
                        <span>Sửa</span>
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="footer_user">
        <p><b><?= $offset + $index + 1 ?></b> trong số <b><?= $totalUsers ?></b> người dùng</p>
        <div class="pagination">
            <?php
            $baseQuery = [
                'controller' => 'order',
                'action' => 'index',
                'status' => $_GET['status'] ?? '',
                'district' => $_GET['district'] ?? '',
                'sort' => $_GET['sort'] ?? '',
            ];
            ?>
            <?php if ($currentPage > 1): ?>
            <?php
                $prevQuery = array_merge($baseQuery, ['page' => $currentPage - 1]);
                ?>
            <button id="prev">
                <a href="?<?= http_build_query($prevQuery) ?>">
                    <i class="fa-solid fa-angle-left"></i>
                    <span>Trước</span>
                </a>
            </button>
            <?php endif; ?>

            <?php if ($currentPage < $totalPages): ?>
            <?php
                $nextQuery = array_merge($baseQuery, ['page' => $currentPage + 1]);
                ?>
            <button id="next">
                <a href="?<?= http_build_query($nextQuery) ?>">
                    <span>Sau</span>
                    <i class="fa-solid fa-angle-right"></i>
                </a>
            </button>
            <?php endif; ?>
        </div>
    </div>
    <div class="form_lock_overlay">
        <form class="form_lock" action="/web_bantrasua/myapp/admin/user/handleLock" method="POST">
            <div class="heading_lock">
                <h2></h2>
            </div>
            <div class="content_lock">
            </div>
            <input type="hidden" name="id" id="id_lock">
            <input type='hidden' name="status" id="status_lock">
            <div class=" footer_lock">
                <button type="button" class="btn_cancel" onclick="handleCancel()">Hủy</button>
                <button type="submit" class="btn_lock" onclick="handleLockUser()">Khóa</button>
            </div>
            <div class="lock_background">
                <div class="check"></div>
                <span>Đã khóa</span>
            </div>
        </form>
    </div>
    <div class="form_modify_overlay">
        <form class="form_modify" action="/web_bantrasua/myapp/admin/user/handleModify" method="POST">
            <div class="heading_modify">
                <h2>Thông tin cần sửa</h2>
            </div>
            <div class="content_modify">
                <input type="hidden" name="id" id="id_modify">
                <h4>Họ và tên</h4>
                <input type="text" id="name_modify" name="username" placeholder="Nhập họ và tên">
                <h4>Email</h4>
                <input type="text" id="email_modify" name="email" placeholder="Nhập email">
                <h4>Số điện thoại</h4>
                <input type="text" id="phone_modify" name="phone" placeholder="Nhập số điện thoại">
            </div>
            <div class="footer_modify">
                <button type="button" class="btn_cancel" onclick="handleCancel()">Hủy</button>
                <button type="submit" class="btn_modify" onclick="handleModifyUser()">Sửa</button>
            </div>
            <div class="modify_background">
                <div class="check"></div>
                <span>Xong</span>
            </div>
        </form>
    </div>
    <div class="form_add_overlay">
        <form class="form_add" action="/web_bantrasua/myapp/admin/user/handleAdd" method="POST">
            <div class="heading_add">
                <h2>Thêm tài khoản người dùng</h2>
            </div>
            <div class="content_add">
                <h4>Họ và tên</h4>
                <input type="text" name="username" placeholder="Nhập họ và tên">
                <h4>Email</h4>
                <input type="text" name="email" placeholder="Nhập email">
                <h4>Số điện thoại</h4>
                <input type="text" name="phone" placeholder="Nhập số điện thoại">
                <h4>Mật khẩu</h4>
                <input type="text" name="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="footer_add">
                <button type="button" class="btn_cancel" onclick="handleCancel()">Hủy</button>
                <button type="submit" class="btn_add">Tạo</button>
            </div>
            <?php if (isset($_SESSION['success'])): ?>
            <script>
            document.addEventListener("DOMContentLoaded", () => {
                handleAddUser();
            });
            </script>
            <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <div class="add_background">
                <div class="check"></div>
                <span>Đã tạo</span>
            </div>
        </form>
    </div>
</section>
<?php if (isset($_SESSION['error'])): ?>
<p id="error-message"
    style="display: flex; height: 40px; font-weight: 600; padding: 0 20px; align-items: center; width: max-content; color:#fff; background: red; position: absolute; top: 20px; border-radius: 10px;">
    <?= $_SESSION['error'] ?></p>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>
<script src="<?php echo ASSETS . 'js/admin/user.js'; ?>"></script>
<script>
if (document.getElementById('error-message')) {
    setTimeout(() => {
        document.getElementById('error-message').remove();
    }, 2000)
}
</script>

</html>