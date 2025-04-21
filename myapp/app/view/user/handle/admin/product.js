function toggleOptions(event, element) {
    event.stopPropagation();
    const optionsMenu = element.nextElementSibling;

    const allMenu = document.querySelectorAll('.product-table_feature-menu');

    allMenu.forEach((menu) => {
        if (menu !== optionsMenu) {
            menu.style.display = 'none';
        }
    });

    if (optionsMenu.style.display === 'block') {
        optionsMenu.style.display = 'none';
    } else {
        optionsMenu.style.display = 'block';
    }
    window.addEventListener('click', closeOptionsMenu);

    function closeOptionsMenu(e) {
        if (!optionsMenu.contains(e.target) && !element.contains(e.target)) {
            optionsMenu.style.display = 'none';
            window.removeEventListener('click', closeOptionsMenu);
        }
    }
}

function loadProduct(id) {
    document.querySelector(".product-iframe-content").style.height = "80%";
    document.querySelector(".product-iframe").style.display = "flex";
    const change = document.getElementById("product-change");
    const add = document.getElementById("product-add");
    const del = document.getElementById("product-delete");
    del.style.display = "none"
    add.style.display = "none";
    change.style.display = "none";
    if (id === "add") {
        add.style.display = "flex";
    } else if (id === "change") {
        change.style.display = "flex";
    } else{
        document.querySelector(".product-iframe-content").style.height = "15%";
        del.style.display = "flex";
    }
}

window.addEventListener("message", function (event) {
    if (event.data === "closeProduct") {
        document.querySelector(".product-iframe").style.display = "none";
    }
});