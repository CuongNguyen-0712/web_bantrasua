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

            button.classList.add('active');
            buttonActive = button;
            if (parentBtn[i + 1]) {
                parentBtn.forEach(el => el.style.zIndex = '0');
                parentBtn[i + 1].style.zIndex = '1';
            }
        })

    }

    window.addEventListener('click', (e) => {
        if (e.target !== buttonActive) {
            featureBtns.forEach(btn => {
                btn.classList.remove('active');
            })
        }
    })
})

const overlay_delete = document.querySelector('.form_delete_overlay');
const delete_background = document.querySelector('.delete_background');
const cancel_btn = document.querySelector('.btn_cancel');
const delete_btn = document.querySelector('.btn_delete');
const handleShowFormDelete = () => {
    overlay_delete.classList.add('show');
}

const handleDelete = () => {
    delete_background.classList.add('show');
    setTimeout(() => {
        overlay_delete.classList.remove('show');
        delete_background.classList.remove('show');
    }, 1000)
}

const handleCancel = () => {
    overlay_delete.classList.remove('show');
}