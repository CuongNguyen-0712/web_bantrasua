function toggleOptions(event, element) {
    event.stopPropagation(); 
    const optionsMenu = element.nextElementSibling; 
    
    const allMenu = document.querySelectorAll('.option-menu');

    allMenu.forEach((menu) => {
        if (menu !== optionsMenu) {
            menu.style.display = 'none';
        }
    });

    if (optionsMenu.style.display === 'block') {
        optionsMenu.style.display = 'none';
        window.removeEventListener('click', closeOptionsMenu);
    } else {
        optionsMenu.style.display = 'block';
        window.addEventListener('click', closeOptionsMenu);
    }

    function closeOptionsMenu(e) {
        if (!optionsMenu.contains(e.target) && !element.contains(e.target)) {
            optionsMenu.style.display = 'none';
            window.removeEventListener('click', closeOptionsMenu);
        }
    }
}