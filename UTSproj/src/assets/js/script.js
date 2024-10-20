document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    var deleteEventIdInput = document.getElementById('deleteEventId');
    var confirmDeleteButton = document.getElementById('confirmDelete');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var eventId = button.getAttribute('data-id');
        deleteEventIdInput.value = eventId;
    });

    confirmDeleteButton.addEventListener('click', function () {
        var eventId = deleteEventIdInput.value;
        window.location.href = "delete-process.php?id_events=" + eventId;
    });
});
