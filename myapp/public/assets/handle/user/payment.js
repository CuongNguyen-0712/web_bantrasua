const address_btn = document.querySelector(".cart-form__btn");
const close_btn = document.querySelector(".address-form-icon-x.fa-solid.fa-circle-xmark");
const address_properties = document.querySelector(".address");

address_btn.addEventListener("click", () => {
    address_properties.classList.add("show");
})

close_btn.addEventListener("click", ()=> {
    address_properties.classList.remove("show");
})