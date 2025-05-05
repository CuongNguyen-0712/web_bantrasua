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

    const adminInfo_btn = document.querySelector(".admin_info");
    const admin_center = document.querySelector(".admin_dropdown");

    adminInfo_btn.addEventListener("click", (e) => {
        e.stopPropagation();
        admin_center.classList.toggle("active");
        contentBtns.forEach((btn) => {
            btn.classList.remove("active");
        })
    })

    const close_aside_tablet = document.querySelector(".close_aside");

    close_aside_tablet.addEventListener("click", () => {
        asideBar.classList.remove("active");
        main.classList.remove("active");
    })

});
const handleLoadContent = (page) => {
    var iframe = document.getElementById('content_admin');
    iframe.src = page;
}
