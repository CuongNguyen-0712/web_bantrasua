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

//     const product_columns = document.querySelectorAll(".statistics_product .columns");
//     const user_columns = document.querySelectorAll(".statistics_user .columns");
//     const product_detail = document.querySelector(".statistics_product_detail");
//     const user_detail = document.querySelector(".statistics_user_detail");
//     const detail_btns = document.querySelectorAll(".footer_detail button");

//     product_columns.forEach((column) => {
//         column.addEventListener("click", () => {
//             product_detail.classList.add("show");
//         })
//     })

//     user_columns.forEach((column) => {
//         column.addEventListener("click", () => {
//             user_detail.classList.add("show");
//         })
//     })

//     detail_btns.forEach(btn => {
//         btn.addEventListener("click", () => {
//             product_detail.classList.remove("show");
//             user_detail.classList.remove("show");
//         })
//     })

//     const statistics_value = document.querySelector(".statistics_value");
//     const table_value = document.querySelector(".table_value");

//     statistics_value.addEventListener("click", () => {
//         table_value.classList.toggle("show");
//     })

//     window.addEventListener("click", (e) => {
//         if (!table_value.contains(e.target) && !statistics_value.contains(e.target)) {
//             table_value.classList.remove("show");
//         }
//     })
// })