document.addEventListener("DOMContentLoaded", function() {
    var deleteButton = document.getElementById('deleteButton');
    var deleteForm = document.getElementById('deleteForm');

    deleteButton.addEventListener('click', function() {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            deleteForm.submit();
        }
    });
});
