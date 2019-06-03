// Confirm folder delete
$(document).ready(function() {
    $("#f-delete").click(function() {
        return confirm('Are you sure you want to delete this post?');
    });
});

// Slide toggle create new folder form
$(document).ready(function(){
    $("#folder-create p").click(function(){
        $("#folder-create form").slideToggle("1100");
    });
});
