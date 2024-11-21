function loadOrdersDetail() {
    document.querySelector(".orders-detail").style.display = "flex";
}

window.addEventListener("message", function(event) {
    if (event.data === "closeOrdersDetail") {
        document.querySelector(".orders-detail").style.display = "none";
    }
});
