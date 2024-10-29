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

    const contentBtns = document.querySelectorAll(".btn");

    contentBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            contentBtns.forEach((btn) => {
                btn.classList.remove("active");
            })
            btn.classList.add("active");
        })
    })

    const adminInfoBtn = document.querySelector(".feature_admin > i");
    const adminInfo = document.querySelector(".admin_nav");
    
    adminInfoBtn.addEventListener("click", () => {
        adminInfo.classList.toggle("active");
        adminInfoBtn.classList.toggle("change")
    })
});

const handleLoadContent = (page) => {
    var iframe = document.getElementById('content_admin');
    iframe.src = page;
}

