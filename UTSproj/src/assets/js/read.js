function toggleDescription(id) {
    const shortDesc = document.getElementById('short-desc-' + id);
    const fullDesc = document.getElementById('full-desc-' + id);
    const toggleBtn = document.getElementById('toggle-btn-' + id);

    if (fullDesc.style.display === 'none') {
        fullDesc.style.display = 'inline';
        shortDesc.style.display = 'none';
        toggleBtn.textContent = 'Read Less';
    } else {
        fullDesc.style.display = 'none';
        shortDesc.style.display = 'inline';
        toggleBtn.textContent = 'Read More';
    }
}
