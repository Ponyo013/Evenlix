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

    const editEventModal = document.getElementById('editEventModal');

    if (editEventModal) {
        editEventModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const datetime = button.getAttribute('data-datetime');
            const capacity = button.getAttribute('data-capacity');
            const location = button.getAttribute('data-location');
            const description = button.getAttribute('data-description');
            const status = button.getAttribute('data-status');

            document.getElementById('event_id').value = id;
            document.getElementById('event-name').value = name;
            document.getElementById('DnT').value = datetime;
            document.getElementById('slot').value = capacity;
            document.getElementById('lokasi').value = location;
            document.getElementById('deskripsi').value = description;
            document.getElementById('status').value = status;
        });
    }
});

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('profileImagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; 
            document.getElementById('profileImage').style.display = 'none';
        }

        reader.readAsDataURL(input.files[0]);
    }
}