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


document.getElementById('productImage').addEventListener('change', function(event) {
    const fileInput = event.target;
    const previewContainer = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImg');

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(fileInput.files[0]);
    } else {
        previewContainer.style.display = 'none';
        previewImage.src = '';
    }
});

function removePreview() {
    document.getElementById('productImage').value = '';                    // Xóa input file
    document.getElementById('previewImg').src = '';                        // Xóa ảnh hiển thị
    document.getElementById('imagePreview').style.display = 'none';        // Ẩn khung preview
    document.getElementById('removeImageFlag').value = 1;                // Đánh dấu xóa
}

