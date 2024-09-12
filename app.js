// app.js

// Get the modal element
var modal = document.getElementById("popupModal");

// Get the button that opens the modal
var btn = document.getElementById("login");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
    
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
////////////////////////////////////////////////////////////
// Get all account items
// script.js

document.addEventListener('DOMContentLoaded', function () {
    var accountItems = document.querySelectorAll('.account-item');

    // Add click event listeners to each account item to mark it as selected
    accountItems.forEach(function (item) {
        item.addEventListener('click', function () {
            // Remove 'selected' class from all items
            accountItems.forEach(function (item) {
                item.classList.remove('selected');
            });
            // Add 'selected' class to the clicked item
            item.classList.add('selected');
        });
    });

    // Handle submit button click
    document.getElementById('submitAccount').addEventListener('click', function () {
        // Find the selected account
        var selectedAccount = document.querySelector('.account-item.selected');

        if (selectedAccount) {
            var accountType = selectedAccount.querySelector('p').innerText;
            console.log('Selected account:', accountType);

            // Close the modal (optional)
            modal.style.display = "none";

            // Load the login screen based on the selected account type
            loadLoginScreen(accountType);
        } else {
            alert('Please select an account.');
        }
    });

    // Function to load login screen based on account type
    function loadLoginScreen(accountType) {
        // Example: Redirect to a different page or load content dynamically
        switch (accountType.toLowerCase()) {
            case 'learner':
                window.location.href = 'login.php'; // Example URL
                break;
            case 'facilitator':
                window.location.href = 'facilitator-login.php'; // Example URL
                break;
            case 'assessor':
                window.location.href = 'assessor-login.php'; // Example URL
                break;
            case 'moderator':
                window.location.href = 'moderator-login.php'; // Example URL
                break;
            case 'administrator':
                window.location.href = 'admin-login.php'; // Example URL
                break;
            default:
                // Handle unexpected account types or do nothing
                console.error('Unsupported account type:', accountType);
                break;
        }
    }
});
