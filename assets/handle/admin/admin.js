document.addEventListener("DOMContentLoaded", () => {
    const contentBtns = document.querySelectorAll(".btn");

    contentBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            contentBtns.forEach((btn) => {
                btn.classList.remove("active");
            })
            btn.classList.add("active");
        })
    })

    const asideBar = document.querySelector(".aside_admin");
    const main = document.querySelector(".main_admin");

    const listMenuBtn = document.querySelector(".fa-solid.fa-bars");
    listMenuBtn.addEventListener("click", () => {
        asideBar.classList.toggle("active");
        main.classList.toggle("active");
    })
});


const handleLoadContent = (page) => {
    var iframe = document.getElementById('content_admin');
    iframe.src = page;
}

