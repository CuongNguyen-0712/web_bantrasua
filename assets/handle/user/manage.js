const iframe = document.getElementById('manageIframe');
const purchaseBtn = document.getElementById('purchase');
const infoBtn = document.getElementById('info');
const btns = document.querySelectorAll('.menu li')

btns.forEach(btn => {
    btn.addEventListener('click', () => {
        btns.forEach(btn => btn.classList.remove('active'));
        btn.classList.add('active');
    })
})

infoBtn.addEventListener('click', () => {
    iframe.src = './information.html';
})

purchaseBtn.addEventListener('click', () => {
    iframe.src = './purchase.html';
})

document.getElementById('return').addEventListener('click', () => {
    window.location.href = '/pages/user/home.html';
})

iframe.addEventListener('load', () => {
    const iframeView = iframe.contentDocument || iframe.contentWindow.document;
    const value = iframeView.getElementById('value');

    if (!value) return;

    window.addEventListener('click', (e) => {
        if (!iframe.contains(e.target) && !value.contains(e.target)) {
            value.classList.remove('active');
        }
    });

    iframeView.addEventListener('click', (e) => {
        if (!value.contains(e.target)) {
            value.classList.remove('active');
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const parames = new URLSearchParams(window.location.search);
    const iframeSrc = parames.get('iframe');

    if(iframeSrc === './information.html') {
        infoBtn.classList.add('active');
    }
    else if(iframeSrc === './purchase.html') {
        purchaseBtn.classList.add('active');
    }

    iframe.src = decodeURIComponent(iframeSrc);
})

