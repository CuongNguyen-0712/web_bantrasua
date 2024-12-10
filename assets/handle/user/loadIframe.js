const handleLoadContent = (page) => {
    var iframe = document.getElementById('content_user');
    iframe.src = page;
}

function check() {
    alert("Vui lòng đăng nhập để tiếp tục!!!");
    document.location.href = '/pages/user/login.html'
}