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

    if(!onHandle) {
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

const overlay_delete = document.querySelector('.form_delete_overlay');
const delete_background = document.querySelector('.delete_background');
const delete_btn = document.querySelector('.btn_delete');

const overlay_lock = document.querySelector('.form_lock_overlay');
const lock_background = document.querySelector('.lock_background');
const lock_btn = document.querySelector('.btn_lock');

const overlay_add = document.querySelector('.form_add_overlay');
const add_background = document.querySelector('.add_background');
const add_btn = document.querySelector('.btn_add');

const cancel_btn = document.querySelector('.btn_cancel');
const handleShowFormDelete = () => {
    onHandle = true;
    overlay_delete.classList.add('show');
}

const handleShowFormLock = () => {
    onHandle = true;
    overlay_lock.classList.add('show');
}

const handleShowFormAdd = () => {
    onHandle = true;
    overlay_add.classList.add('show');
}

const handleDeleteUser = () => {
    delete_background.classList.add('show');
    setTimeout(() => {
        overlay_delete.classList.remove('show');
        delete_background.classList.remove('show');
        onHandle = false;
    }, 1000)
}

const handleLockUser = () => {
    lock_background.classList.add('show');
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
    overlay_delete.classList.remove('show');
    overlay_lock.classList.remove('show');
    overlay_add.classList.remove('show');
    onHandle = false;
}