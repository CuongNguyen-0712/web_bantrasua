const show_password = document.getElementById("passwordShown");

let isShown = false

show_password.addEventListener("click", () => {
    isShown = !isShown
    if (isShown) {
        document.getElementById("password").setAttribute("type", "text");
    }
    else {
        document.getElementById("password").setAttribute("type", "password");
    }
});

document.getElementById('login-form').addEventListener('submit', (e) => {
    e.preventDefault();
    window.location.href = '/pages/user/home.html';
})