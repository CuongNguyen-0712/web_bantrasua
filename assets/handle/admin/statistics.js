document.addEventListener("DOMContentLoaded", () => {
    const statistics_product = document.querySelector(".statistics_product");
    const statistics_user = document.querySelector(".statistics_user");
    const columns = document.querySelectorAll(".columns");

    setTimeout(() => {
        statistics_product.classList.add("active");
        statistics_user.classList.add("active");
    }, 1000)

    for(let i = 0; i < columns.length; i++) {
        columns[i].style.transitionDelay = `${i * 0.2}s`;
    }
})