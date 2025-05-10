let onHandle = false;

document.addEventListener("DOMContentLoaded", () => {
    let buttonActive;
    const featureBtns = document.querySelectorAll('.feature > i');
    const parentBtn = document.querySelectorAll('li')

    for (let i = 0; i < featureBtns.length; i++) {
        const button = featureBtns[i];

        button.addEventListener('click', () => {
            featureBtns.forEach(btn => {
                btn.classList.remove('active');
            })

            document.body.style.overflow = 'hidden';
            button.classList.add('active');
            buttonActive = button;
            if (parentBtn[i + 1]) {
                parentBtn.forEach(el => el.style.zIndex = '0');
                parentBtn[i + 1].style.zIndex = '1';
            }
        })

    }

    if (!onHandle) {
        window.addEventListener('click', (e) => {
            if (e.target !== buttonActive) {
                featureBtns.forEach(btn => {
                    btn.classList.remove('active');
                })
                document.body.style.overflow = 'auto';
            }
        })
    }
})

const overlay_modify = document.querySelector('.form_modify_overlay');
const modify_background = document.querySelector('.modify_background');
const modify_btn = document.querySelector('.btn_modify');

const overlay_lock = document.querySelector('.form_lock_overlay');
const lock_background = document.querySelector('.lock_background');
const lock_btn = document.querySelector('.btn_lock');

const overlay_add = document.querySelector('.form_add_overlay');
const add_background = document.querySelector('.add_background');
const add_btn = document.querySelector('.btn_add');

const cancel_btn = document.querySelector('.btn_cancel');
const handleShowFormModify = (button) => {
    onHandle = true;

    document.getElementById('id_modify').value = button.dataset.id;
    document.getElementById('name_modify').value = button.dataset.name;
    document.getElementById('email_modify').value = button.dataset.email;
    document.getElementById('phone_modify').value = button.dataset.phone;

    overlay_modify.classList.add('show');
}

const handleShowFormLock = (button) => {
    onHandle = true;
    document.getElementById('id_lock').value = button.dataset.id;
    document.getElementById('status_lock').value = button.dataset.status;
    document.querySelector('.heading_lock h2').innerText = (button.dataset.status == 0) ? 'Khóa tài khoản này' : 'Mở khóa tài khoản này';
    document.querySelector('.content_lock').innerText = (button.dataset.status == 1 ? 'Tài khoản người dùng này được mở khóa' : 'Tài khoản người dùng này sẽ bị khóa')
    document.querySelector('.btn_lock').innerText = (button.dataset.status == 0) ? 'Khoá' : 'Mở';

    overlay_lock.classList.add('show');
}


const handleShowFormAdd = () => {
    onHandle = true;
    overlay_add.classList.add('show');
}

const handleModifyUser = () => {
    modify_background.classList.add('show');
    setTimeout(() => {
        overlay_modify.classList.remove('show');
        modify_background.classList.remove('show');
        onHandle = false;
    }, 1000)
}

const handleLockUser = () => {
    lock_background.classList.add('show');
    document.getElementById('lockForm').submit();
    setTimeout(() => {
        overlay_lock.classList.remove('show');
        lock_background.classList.remove('show');
        onHandle = false;
    }, 1000)
}

const handleAddUser = () => {
    add_background.classList.add('show');
    setTimeout(() => {
        overlay_add.classList.remove('show');
        add_background.classList.remove('show');
        onHandle = false;
    }, 1000)
}

const handleCancel = () => {
    overlay_modify.classList.remove('show');
    overlay_lock.classList.remove('show');
    overlay_add.classList.remove('show');
    onHandle = false;
}