// script.js
$(document).ready(function () {
    // Define elements
    var registrationModal = $('#registration-modal');
    var tryButton = $('.tryButton');
    var closeButton = $('.close');

    // Open modal
    tryButton.on('click', function () {
        registrationModal.fadeIn();
    });

    // Close modal
    closeButton.on('click', function () {
        registrationModal.fadeOut();
    });

    // Close modal when clicking outside
    $(window).on('click', function (event) {
        if ($(event.target).is(registrationModal)) {
            registrationModal.fadeOut();
        }
    });

    // Example password strength check (basic version)
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
            case 1:
                indicator.css('background', 'yellow').addClass('weak');
                break;
            case 2:
                indicator.css('background', 'linear-gradient(to right, yellow, green)').addClass('medium');
                break;
            case 3:
                indicator.css('background', 'linear-gradient(to right, yellow, green, red)').addClass('strong');
                break;
            default:
                indicator.css('background', 'none');
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
        alert('Form submitted!');
    });
});
