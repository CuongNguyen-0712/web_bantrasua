const select = document.getElementById('value');
const selectTable = document.getElementById('select-table');
const valueSelect = document.getElementById('value-select');
const values = document.querySelectorAll('#select-table li');

select.addEventListener('click', () => {
    select.classList.toggle('active');
})

for(let value of values){
    value.addEventListener('click', () => {
        valueSelect.innerHTML = value.innerHTML;
        select.classList.remove('active');
    })
}

document.getElementById('detail').addEventListener('click', () => {
   window.parent.location.href = './detailPurchase.html'
})

document.getElementById('reorder').addEventListener('click', () => {
    window.parent.location.href = './payment.html'
})