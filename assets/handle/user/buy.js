const parentDoc = window.parent.document;
const submitBtn = document.querySelector('button[type="submit"]');
const form = document.getElementById('formBuy')
const closeBtn = document.getElementById('close');
const iframeBuy = parentDoc.getElementById('iframeBuy');

window.addEventListener('message', (e) => {
    const value = e.data
    
    if (value === 'buy'){
        submitBtn.innerText = 'Mua ngay'
        iframeBuy.style.display = 'flex';
        parentDoc.body.style.overflow = 'hidden';

        form.addEventListener('submit', () => {
            window.parent.location.href = './cart.html'
        })
    }
    else if(value === 'cart'){
        submitBtn.innerText = 'Thêm vào giỏ hàng'
        iframeBuy.style.display = 'flex';
        parentDoc.body.style.overflow = 'hidden';
    }
    else{
        iframeBuy.style.display = 'none';
    }
})

submitBtn.addEventListener('click', () => {
    iframeBuy.style.display = 'none';
    parentDoc.body.style.overflow = '';
})

closeBtn.addEventListener('click', () => {
    iframeBuy.style.display = 'none';
    parentDoc.body.style.overflow = '';
})

const sizeBtn = document.querySelectorAll('.size button')
const sugarBtn = document.querySelectorAll('.sugar button')
const iceBtn = document.querySelectorAll('.ice button')

sizeBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        sizeBtn.forEach(b => b.classList.remove('active'))
        btn.classList.add('active')
    })
})

sugarBtn.forEach(btn => {    
    btn.addEventListener('click', () => {
        sugarBtn.forEach(b => b.classList.remove('active'))
        btn.classList.add('active')
    })
})

iceBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        iceBtn.forEach(b => b.classList.remove('active'))
        btn.classList.add('active')
    })
})

