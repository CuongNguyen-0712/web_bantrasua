const inputs = document.getElementsByTagName('input')
for(let input of inputs){
    input.setAttribute('disabled', true)
}

const confirmBtn = document.getElementById('confirm')

document.getElementById('edit').addEventListener('click', () => {  
    for(let input of inputs){
        input.removeAttribute('disabled')
    }
    confirmBtn.removeAttribute('disabled')
})

confirmBtn.addEventListener('click', () => {
    for(let input of inputs){
        input.setAttribute('disabled', true)
    }
    confirmBtn.setAttribute('disabled', true)
})