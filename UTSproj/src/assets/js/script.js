document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    var deleteEventIdInput = document.getElementById('deleteEventId');

    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var eventId = button.getAttribute('data-id');
            deleteEventIdInput.value = eventId; 
        });
    }

    var deleteUserModal = document.getElementById('deleteUserModal');
    var deleteUserIdInput = document.getElementById('userId');

    if (deleteUserModal) {
        deleteUserModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-user-id');
            deleteUserIdInput.value = userId; 
        });
    }
});
