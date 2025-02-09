const page = document.querySelector('.input-group')

const nextBtn = document.getElementById('btn_next')
const backBtn = document.getElementById('btn_back')

nextBtn.addEventListener('click', () => {
    page.style.left = '-100%';
    page.style.transtion = '0.2s all ease';
})

backBtn.addEventListener('click', () => {
    page.style.left = '0';
    page.style.transtion = '0.2s all ease';
})

document.getElementById('signup-form').addEventListener('submit', (e) => {
    e.preventDefault();
    window.location.href = '/pages/user/login.html';
})