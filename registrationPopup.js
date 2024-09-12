$(document).ready(function () {
    console.log('Document is ready.');

    var modal = $('#registration-modal');
    var newUserBtn = $('#new-user-btn');
    var span = $('.close');

    // Open modal
    newUserBtn.on('click', function () {
        modal.fadeIn();
    });

    // Close modal
    span.on('click', function () {
        modal.fadeOut();
    });

    // Close modal when clicking outside
    $(window).on('click', function (event) {
        if ($(event.target).is(modal)) {
            modal.fadeOut();
        }
    });

    // Function to check password strength
    function checkPasswordStrength(password, indicatorId) {
        var strength = 0;
        var indicator = $(indicatorId);
        indicator.removeClass('weak medium strong');

        if (password.length >= 3) {
            if (password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password) && /[^A-Za-z0-9]/.test(password)) {
                strength = 3; // strong
            } else if (password.length > 6 && /[A-Z]/.test(password) && /[0-9]/.test(password)) {
                strength = 2; // medium
            } else {
                strength = 1; // weak
            }
        }

        switch (strength) {
            case 0:
                indicator.css('background', 'none');
                break;
            case 1:
                indicator.css('background', 'yellow').addClass('weak');
                break;
            case 2:
                indicator.css('background', 'linear-gradient(to right, yellow, green)').addClass('medium');
                break;
            case 3:
                indicator.css('background', 'linear-gradient(to right, yellow, green, red)').addClass('strong');
                break;
        }
    }

    // Update password strength indicators on input
    $('#reg-password, #reg-confirm-password').on('input', function () {
        var password = $('#reg-password').val();
        var confirmPassword = $('#reg-confirm-password').val();

        // Update the strength indicator for the password field
        checkPasswordStrength(password, '#password-strength-indicator');

        // Update the strength indicator for the confirm password field
        var confirmIndicator = $('#confirm-password-strength-indicator');
        confirmIndicator.removeClass('weak medium strong');
        if (confirmPassword.length > 0) {
            if (password === confirmPassword) {
                checkPasswordStrength(confirmPassword, '#confirm-password-strength-indicator');
                var strength = $('#password-strength-indicator').attr('class');
                confirmIndicator.css('background', $('#password-strength-indicator').css('background')).addClass(strength);
            } else {
                confirmIndicator.css('background', 'none');
            }
        }

        // Show error message if passwords do not match
        if (confirmPassword !== '' && password !== confirmPassword) {
            $('#password-error-message').text('Passwords do not match').show();
        } else {
            $('#password-error-message').hide();
        }
    });

    // Form submission handler for registration
    $('#registration-form').on('submit', function (event) {
        event.preventDefault();

        console.log('Registration form submitted.');

        var name = $('#reg-name').val().trim();
        var surname = $('#reg-surname').val().trim();
        var email = $('#reg-email').val().trim();
        var username = $('#reg-username').val().trim();
        var password = $('#reg-password').val();
        var confirmPassword = $('#reg-confirm-password').val();

        console.log('Form values:', {
            name: name,
            surname: surname,
            email: email,
            username: username,
            password: password,
            confirmPassword: confirmPassword
        });

        if (password !== confirmPassword) {
            console.warn('Passwords do not match.');
            alert('Passwords do not match.');
            return;
        }

        // Check password strength before sending
        if ($('#password-strength-indicator').hasClass('weak')) {
            console.warn('Password is too weak.');
            $('#password-error-message').show();
            return;
        }

        $.ajax({
            url: 'registerConnect.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                console.log('AJAX success response:', response);
                try {
                    var result = JSON.parse(response);
                    console.log('Parsed result:', result);

                    if (result.success) {
                        alert(result.message);
                        $('#registration-form').trigger('reset');
                        modal.fadeOut();
                    } else {
                        alert(result.message);
                    }
                } catch (e) {
                    console.error('Failed to parse JSON response:', e);
                    alert('Received an invalid response from the server.');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', {
                    status: status,
                    error: error,
                    responseText: xhr.responseText
                });
                alert('An error occurred. Please try again.');
            }
        });
    });

    // Form submission handler for login
    $('form[action="loginConnect.php"]').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: 'loginConnect.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                // Handle login response
                console.log('Login response:', response);
                // Add login response handling code here
            },
            error: function () {
                alert('An error occurred during login. Please try again.');
            }
        });
    });
});
