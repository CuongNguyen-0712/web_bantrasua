const filter = document.querySelector('.filter-table');
const filterBtn = document.getElementById('change');
const formFilter = document.getElementById('main')

filterBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    filter.classList.toggle('show');
    filterBtn.innerHTML = filter.classList.contains('show')
        ? '<i class="fa-solid fa-xmark"></i>'
        : '<i class="fa-solid fa-filter"></i>';
    formFilter.style.display = filter.classList.contains('show') ? 'flex' : 'none';
});

window.addEventListener('click', (e) => {
    if (!filter.contains(e.target) && e.target !== filterBtn) {
        filter.classList.remove('show');
        filterBtn.innerHTML = '<i class="fa-solid fa-filter"></i>';
        formFilter.style.display = 'none';
    }
});


