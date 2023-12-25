$(document).ready(function() {
    // Handle update button click
    $(".update-button").click(function() {
        var postId = $(this).data("post-id");

        // Toggle the visibility of the form for the clicked post
        $('.update-form[data-post-id="' + postId + '"]').fadeToggle();
    });

    // Handle form submission
    $(".update-form").submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var postId = form.data("post-id");

        $.ajax({
            type: "PUT",
            url: "/home/blog/update-post/" + postId,
            data: form.serialize(),
            success: function(data) {
                // Update the post content on success
                $("#title_" + postId).text(data.title);
                $("#content_" + postId).text(data.content);

                // Hide the form after successful update with a fadeOut effect
                form.fadeOut();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
