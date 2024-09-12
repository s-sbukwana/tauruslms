<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul class="menu-bar">
            <li class="dropdown">
                <a href="#" class="dropbtn">Courses</a>
                <div class="dropdown-content">
                    <a href="#">Computer Technician</a>
                    <a href="#">Software Development</a>
                    <a href="#">Cyber Security</a>
                    <a href="#">Child Development</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Training</a>
                <div class="dropdown-content">
                    <a href="#">Hybrid Classes</a>
                    <a href="#">E-learning</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Testing</a>
                <div class="dropdown-content">
                    <a href="#">In-person exams</a>
                    <a href="#">Online exams</a>
                </div>
            </li>
            <li><a href="#">About Us</a></li>
            <li class="login"><a href="#" id="login">Login</a></li>
        </ul>
    </nav>

    <!-- Login Modal -->
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Welcome!</h2>
            <p>Choose account to login.</p>
            <div id="UserAccounts" class="account">
                <div class="learner account-item" data-url="learner.html">
                    <div class="cropped-image"><img src="learner-icon.png" alt="Learner"></div>
                    <p>Learner</p>
                </div>
                <div class="facilitator account-item" data-url="facilitator.html">
                    <div class="cropped-image"><img src="facilitator-icon.png" alt="Facilitator"></div>
                    <p>Facilitator</p>
                </div>
                <div class="assessor account-item" data-url="assessor.html">
                    <div class="cropped-image"><img src="assessor-icon.png" alt="Assessor"></div>
                    <p>Assessor</p>
                </div>
                <div class="moderator account-item" data-url="moderator.html">
                    <div class="cropped-image"><img src="moderator-icon.png" alt="Moderator"></div>
                    <p>Moderator</p>
                </div>
                <div class="administrator account-item" data-url="administrator.html">
                    <div class="cropped-image"><img src="administrator-icon.png" alt="Administrator"></div>
                    <p>Administrator</p>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
