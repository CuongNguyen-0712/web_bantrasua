document.getElementById('home').addEventListener('click', () => {
    window.location.href = './home.html'    
})

document.getElementById('purchase').addEventListener('click', () => {
    const iframeURL = './purchase.html';
    window.location.href = `/pages/user/manage.html?iframe=${encodeURIComponent(iframeURL)}`
})