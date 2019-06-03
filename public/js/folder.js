// Confirm folder delete
$(document).ready(function() {
    $("#f-delete").click(function() {
        return confirm('Are you sure you want to delete this post?');
    });
});

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
