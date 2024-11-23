document.addEventListener("DOMContentLoaded", () => {
    const statistics_product = document.querySelector(".statistics_product");
    const statistics_user = document.querySelector(".statistics_user");
    const statistics_frame = document.querySelector(".frame_statistics");
    const columns = document.querySelectorAll(".columns");
    const statistics_btns = document.querySelectorAll(".statistics_btn button");

    setTimeout(() => {
        statistics_product.classList.add("active");
    }, 500)

    for(let i = 0; i < statistics_btns.length; i++) {
        statistics_btns[i].addEventListener("click", () => {
            statistics_btns.forEach((btn) => {
                btn.classList.remove("active");
            })
            statistics_btns[i].classList.add("active");
            if (statistics_btns[0].classList.contains("active")) {
                statistics_product.classList.add("active");
                statistics_user.classList.remove("active");
                statistics_frame.classList.remove("change");
            }
            else {
                statistics_user.classList.add("active");
                statistics_product.classList.remove("active");
                statistics_frame.classList.add("change");
            }
        })
    }

    for(let i = 0; i < columns.length; i++) {
        columns[i].style.transitionDelay = `${i * 0.05}s`;
    }

    const product_columns = document.querySelectorAll(".statistics_product .columns");
    const user_columns = document.querySelectorAll(".statistics_user .columns");
    const product_detail = document.querySelector(".statistics_product_detail");
    const user_detail = document.querySelector(".statistics_user_detail");
    const detail_btns = document.querySelectorAll(".footer_detail button");

    product_columns.forEach((column) => {
        column.addEventListener("click", () => {
            product_detail.classList.add("show");
        })
    })

    user_columns.forEach((column) => {
        column.addEventListener("click", () => {
            user_detail.classList.add("show");
        })
    })

    detail_btns.forEach(btn => {
        btn.addEventListener("click", () => {
            product_detail.classList.remove("show");
            user_detail.classList.remove("show");
        })
    })
})
