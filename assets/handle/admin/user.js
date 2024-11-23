document.addEventListener("DOMContentLoaded", () => {
    const featureBtns = document.querySelectorAll('.feature > i');
    const parentBtn = document.querySelectorAll('li')

    for (let i = 0; i < featureBtns.length; i++) {
        const button = featureBtns[i];

        button.addEventListener('click', () => {    
            featureBtns.forEach(btn => {
                btn.classList.remove('active');
            })

            button.classList.add('active');
            if (parentBtn[i + 1]) {
                parentBtn.forEach(el => el.style.zIndex = '0');
                parentBtn[i + 1].style.zIndex = '1';
            }
        })
    }

    window.onclick = ((e) => {
        if (!e.target.matches('.feature i')) {
            featureBtns.forEach(btn => {
                btn.classList.remove('active');
            })
        }
    })
});

