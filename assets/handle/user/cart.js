document.getElementById('returnHome').addEventListener('click', () => {
    window.location.href = './home.html'
})

document.getElementById('add').addEventListener('click', () => {
    const iframeSrc = './product.html';
    window.location.href = `./home.html?iframe=${encodeURIComponent(iframeSrc)}`
})

document.getElementById('buy').addEventListener('click', () => {
    window.location.href = './payment.html'
})