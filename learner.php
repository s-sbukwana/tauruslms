<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyling.css"> <!-- Link to external CSS file -->
    <link rel="stylesheet" href="registrationStyling.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="loginConnect.js"></script>
    <script src="registrationPopup.js"></script>
</head>
<body>
    <!-- Gradient Background Wrapper -->
    <div class="gradient-wrapper"></div>

    <header>
        <nav id="top-nav">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="content-container">
        <div class="half-screen-image">
            <img src="bookonTable.jpg" alt="Description of the image">
        </div>
        <div class="form-container">
            <div class="image-text">
                <h2>Taurus Portal Login</h2>
                <form id="loginForm">
                    <div class="input-container">
                        <label for="login-username">Username</label>
                        <input type="text" id="login-username" name="username" required>
                    </div>
                    <div class="input-container">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" name="password" required>
                    </div>
                    <div class="button-container">
                        <button type="submit">Login</button>
                        <button id="new-user-btn" type="button">New User</button>
                    </div>
                    <div class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </div>
                </form>
                <div id="message"></div> <!-- Message container for displaying feedback -->
            </div>
        </div>
    </div>

    <!-- The modal for new user registration -->
    <div id="registration-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Registration Form</h2>
            <form id="registration-form">
                <div class="grid-container">
                    <div class="input-container">
                        <label for="reg-name">Name</label>
                        <input type="text" id="reg-name" name="name" required>
                    </div>
                    <div class="input-container">
                        <label for="reg-surname">Surname</label>
                        <input type="text" id="reg-surname" name="surname" required>
                    </div>
                    <div class="input-container">
                        <label for="reg-email">Email</label>
                        <input type="email" id="reg-email" name="email" required>
                    </div>
                    <div class="input-container">
                        <label for="reg-username">Username</label>
                        <input type="text" id="reg-username" name="username" required>
                    </div>
                    <div class="input-container">
                        <label for="reg-password">Password</label>
                        <input type="password" id="reg-password" name="password" required>
                        <div id="password-strength-indicator" style="height: 5px; width: 100%; margin-top: 10px;"></div>
                    </div>
                    <div class="input-container">
                        <label for="reg-confirm-password">Confirm Password</label>
                        <input type="password" id="reg-confirm-password" name="confirm-password" required>
                        <div id="confirm-password-strength-indicator" style="height: 5px; width: 100%; margin-top: 10px;"></div>
                        <div class="password-error-message" id="password-error-message">Passwords do not match</div>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
