document.getElementById('back').addEventListener('click', () => {
    window.location.href = './cart.html'
})

const formBasic = document.getElementById('basic');
const formAddress = document.getElementById('address');
const btnsClose = document.querySelectorAll('.close')

document.querySelector('.basic').addEventListener('click', (e) => {
    e.stopPropagation();
    formBasic.classList.add('active');
    document.body.style.overflow = 'hidden';
})

document.querySelector('.address').addEventListener('click', (e) => {
    e.stopPropagation();
    formAddress.classList.add('active');    
    document.body.style.overflow = 'hidden';
})

btnsClose.forEach(btn => btn.addEventListener('click', (e) => {
    e.stopPropagation();
    formBasic.classList.remove('active');
    formAddress.classList.remove('active');
    document.body.style.overflow = '';
}))

document.getElementById('pay').addEventListener('click', () => {
    window.location.href = './result.html'
})
