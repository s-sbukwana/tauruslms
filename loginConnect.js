$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = {
            username: $('#login-username').val(),
            password: $('#login-password').val()
        };

        // Perform AJAX request
        $.ajax({
            type: 'POST',
            url: 'loginConnect.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#message').html('<p style="color:green;">' + response.message + '</p>');
                    // Redirect to the dashboard page
                    window.location.href = response.dashboardUrl;
                } else {
                    $('#message').html('<p style="color:red;">' + response.message + '</p>');
                }
            },
            error: function(xhr, status, error) {
                $('#message').html('<p style="color:red;">An error occurred: ' + error + '</p>');
            }
        });
    });
});
