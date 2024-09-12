document.addEventListener('DOMContentLoaded', function () {
    var loginButton = document.getElementById('login');
    var modal = document.getElementById('popupModal');
    var close = document.querySelector('.modal .close');
    var accountItems = document.querySelectorAll('.account-item');

    // Open the modal
    loginButton.onclick = function (event) {
        event.preventDefault();
        modal.style.display = 'block';
    };

    // Close the modal
    close.onclick = function () {
        modal.style.display = 'none';
    };

    // Close the modal if clicking outside of the modal content
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };

    // Redirect to the URL specified in data-url when clicking an account item
    accountItems.forEach(function (item) {
        item.onclick = function () {
            var url = this.getAttribute('data-url');
            window.location.href = url;
        };
    });
});
