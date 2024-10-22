document.addEventListener("DOMContentLoaded", () => {
    const searchBtn = document.querySelector(".search_icon");
    const searchBar = document.querySelector(".search");
    const inputValueSearch = document.querySelector(".input_search");

    searchBtn.addEventListener("click", () => {
        searchBar.classList.toggle("active");
        if (searchBar.classList.contains("active")) {
            inputValueSearch.focus();
        }
        else {
            inputValueSearch.value = "";
        }
    });
});

const handleLoadContent = (page) => {
    var iframe = document.getElementById('content_admin');
    iframe.src = page;
}