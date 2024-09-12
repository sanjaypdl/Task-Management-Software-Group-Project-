function validateTaskForm() {
    const title = document.getElementById('title').value.trim();
    if (title === '') {
        alert('Title is required');
        return false;
    }
    return true;
}
