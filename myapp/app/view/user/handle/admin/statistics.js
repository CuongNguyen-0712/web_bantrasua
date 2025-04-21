document.addEventListener("DOMContentLoaded", () => {
    const statistics_product = document.querySelector(".statistics_product");
    const statistics_user = document.querySelector(".statistics_user");
    const statistics_frame = document.querySelector(".frame_statistics");
    const columns = document.querySelectorAll(".columns");
    //     const statistics_btns = document.querySelectorAll(".statistics_btn button");

    setTimeout(() => {
        statistics_product.classList.add("active");
        statistics_user.classList.add("active");
    }, 500)

    for (let i = 0; i < columns.length; i++) {
        columns[i].style.transitionDelay = `${i * 0.05}s`;
    }

    const detail_btns = document.querySelectorAll(".heading_product > button");
    const listDetails = document.querySelectorAll(".list_detail");

    for (let i = 0; i < detail_btns.length; i++) {
        detail_btns[i].addEventListener("click", () => {
            listDetails[i].classList.toggle("active");
        })
    }

})
