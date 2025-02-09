document.getElementById('return').addEventListener('click', () => {
    const iframeURL = './purchase.html';
    window.location.href = `/pages/user/manage.html?iframe=${encodeURIComponent(iframeURL)}`
})