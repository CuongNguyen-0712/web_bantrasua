const close_btn = document.querySelector(".address-form-icon-x.fa-solid.fa-circle-xmark");
const address_properties = document.querySelector(".address");

close_btn.addEventListener("click", () => {
    address_properties.style.display = "none";
});