<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Dropdown Menu Example</title>
    <link rel="stylesheet" href="homeStylig.css">
    <!-- Add this in the <head> section of your HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    
    <!--link rel="stylesheet" href="style.css"--> 
 
    <script src="jquery-3.7.1.min.js"></script>
</head>

<body>

    <header>
       <nav class="header-nav">
            <a href="#contact">Contact Us</a>
            <a href="#faqs">FAQs</a>
            <a href="#help">Help</a>
        </nav>
    </header>

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
            <li class="login">
            <a href="#" id="login">
                <i class="fas fa-user"></i> Login
            </a>
        </li>

        </ul>
    </nav>
    <script src="accountPopup.js"></script>

    <!-- Modal for login -->
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Welcome!</h2>
            <p>Choose account to login.</p>
            <div id="UserAccounts" class="account">
                <div class="learner account-item" data-url="learner.php">
                    <div class="cropped-image"><img src="learner-icon.png" alt="Learner"></div>
                    <p>Learner</p>
                </div>
                <div class="facilitator account-item" data-url="facilitator.php">
                    <div class="cropped-image"><img src="facilitator-icon.png" alt="Facilitator"></div>
                    <p>Facilitator</p>
                </div>
                <div class="assessor account-item" data-url="assessor.php">
                    <div class="cropped-image"><img src="assessor-icon.png" alt="Assessor"></div>
                    <p>Assessor</p>
                </div>
                <div class="moderator account-item" data-url="moderator.php">
                    <div class="cropped-image"><img src="moderator-icon.png" alt="Moderator"></div>
                    <p>Moderator</p>
                </div>
                <div class="administrator account-item" data-url="administrator.php">
                    <div class="cropped-image"><img src="administrator-icon.png" alt="Administrator"></div>
                    <p>Administrator</p>
                </div>
            </div>
            
        </div>
        <p>Thank you for choosing taurus.</p>

    </div>


    <!-- Modal for registration -->
    <!-- Modal for registration -->
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

    <section class="news-section">
        <div class="news-header-cp">
            <div class="news-text-content">
                <h2>Work smarter</h2>
                <h3 class="no-bold"><br>Learning made easy with Taurus Learning Solutions</h3><br>
                <button type="button" class="tryButton" id="tryButton">Try us</button>
            </div>
            
            <div class="new-carousel-container">
                <div class="new-carousel-container">
                    <div class="new-carousel">
                        <div class="new-carousel-item">
                            <img src="bookonTable.jpg" alt="Carousel Image 1">
                            <div class="carousel-caption">
                                <h3>First Slide</h3>
                                <p>Description for the first slide.</p>
                            </div>
                        </div>
                        <div class="new-carousel-item">
                            <img src="bookonTable.jpg" alt="Carousel Image 2">
                            <div class="carousel-caption">
                                <h3>Second Slide</h3>
                                <p>Description for the second slide.</p>
                            </div>
                        </div>
                        <div class="new-carousel-item">
                            <img src="bookonTable.jpg" alt="Carousel Image 3">
                            <div class="carousel-caption">
                                <h3>Third Slide</h3>
                                <p>Description for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="new-prev">&#10094;</button>
                    <button class="new-next">&#10095;</button>
                    <div class="new-dots-container">
                        <span class="new-dot active"></span>
                        <span class="new-dot"></span>
                        <span class="new-dot"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="news-container">
            <article class="news-item">
                <img src="bookonTable.jpg" alt="News Image 1">
                <div class="news-text">
                    <h3>The Leader in Online Learning</h3>
                    <time datetime="2024-08-18">August 18, 2024</time>
                    <p>Taurus is the most trusted certifying body of industry professionals.</p>
                    <a href="AboutTaurus.html">Read more</a>
                </div>
            </article>

            <article class="news-item">
                <img src="bookonTable.jpg" alt="News Image 2">
                <div class="news-text">
                    <h3>Flexible Online Solutions</h3>
                    <time datetime="2024-08-17">August 17, 2024</time>
                    <p>Self-study, virtual classes, interactive labs, practice exams.</p>
                    <a href="ExploreTraining.html">Read more</a>
                </div>
            </article>

            <article class="news-item">
                <img src="bookonTable.jpg" alt="News Image 3">
                <div class="news-text">
                    <h3>Certify Your Techniques</h3>
                    <time datetime="2024-08-16">August 16, 2024</time>
                    <p>Prove to an employer you have what it takes.</p>
                    <a href="BrowseCourses.html">Read more</a>
                </div>
            </article>

            <article class="news-item">
                <img src="news-image4.jpg" alt="News Image 4">
                <div class="news-text">
                    <h3>Level Up Your Business</h3>
                    <time datetime="2024-08-15">August 15, 2024</time>
                    <p>The payoff is huge! Invest in tech-specific career development.</p>
                    <a href="LearnMore.html">Read more</a>
                </div>
            </article>
        </div>
    </section>

    <script src="newscarousel.js"></script>


    <script src="pop_upScript.js"></script>

    <div class="featured-courses-container">
        <div class="featured-courses-wrapper">
            <h2>Featured Courses</h2>
            <button class="view-all">View All Courses</button>
            <div class="carousel-container">
                <div class="carousel">
                    <div class="carousel-item" data-file="software-development.txt">
                        <div class="card">
                            <h3>Software Development</h3>
                            <img src="bookonTable.jpg" alt="Course 1">
                            <p>Learn the fundamentals of software development, programming languages, and project management.</p>
                        </div>
                    </div>

                    <div class="carousel-item" data-file="child-development.txt">
                        <div class="card">
                            <h3>Child Development</h3>
                            <img src="bookonTable.jpg" alt="Child Development">
                            <p>Explore the stages of child development and learn about the key milestones that shape a child's growth.</p>
                        </div>
                    </div>
                    
                    <div class="carousel-item" data-file="computer-technician.txt">
                        <div class="card">
                            <h3>Computer Technician</h3>
                            <img src="bookonTable.jpg" alt="Computer Technician">
                            <p>Learn the essential skills and knowledge required to become a proficient computer technician.</p>
                        </div>
                    </div>

                    <div class="carousel-item" data-file="cyber-security.txt">
                        <div class="card">
                            <h3>Cyber Security</h3>
                            <img src="bookonTable.jpg" alt="Cyber Security">
                            <p>Protect organizations from digital threats with our Cyber Security course.</p>
                        </div>
                    </div>
                    <!-- Duplicates for infinite scrolling -->
                    <div class="carousel-item">
                        <div class="card">
                            <h3>Course 1</h3>
                            <img src="bookonTable.jpg" alt="Course 1">
                            <p>Short description of Course 1.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <h3>Course 2</h3>
                            <img src="bookonTable.jpg" alt="Course 2">
                            <p>Short description of Course 2.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <h3>Course 3</h3>
                            <img src="bookonTable.jpg" alt="Course 3">
                            <p>Short description of Course 3.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <h3>Course 4</h3>
                            <img src="bookonTable.jpg" alt="Course 4">
                            <p>Short description of Course 4.</p>
                        </div>
                    </div>
                </div>
                <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next" onclick="moveSlide(1)">&#10095;</button>
                <div class="dots-container">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

            <div class="course-information-container">
                <div class="additional-info"></div>
                <button class="toggle-info" style="display: none;">Show More Information</button>
            </div>
        </div>
    </div>

    <script src="carouselClickIten.js"></script>
    <script src="carousel.js"></script>

    <div class="testing-container">
        <div class="testing-section">
            <div class="section-container">
                <div class="section-content">
                    <p>Our certification exam preparation is meticulously designed to cover every aspect of the subject. We provide comprehensive resources that include practice exams, detailed study guides, and interactive eLearning modules.</p>
                    <img src="bookonTable.jpg" alt="Description of the image" class="section-image">
                </div>
            </div>
            <h3>e-Learning</h3>

            <div class="paragraph-and-buttons">
                <p class="detail-paragraph">Our e-Learning platform offers a comprehensive and immersive learning experience designed to cater to various learning preferences.</p>
                <div class="training-buttons">
                    <button class="training-btn">E-learning</button>
                    <button class="training-btn">Exam Preps</button>
                    <button class="training-btn">Study Guides</button>
                    <button class="training-btn">Instructor Training</button>
                </div>
                <h3>Hybrid and Work-Based Learning</h3>
                <p class="hybrid-paragraph">Our Hybrid and Work-Based Learning options combine the flexibility of online education with practical, hands-on experience.</p>
                <div class="training-buttons">
                    <button class="training-btn">Online Testing</button>
                    <button class="training-btn">In-Person Training</button>
                </div>
            </div>
        </div>
    </div>

    <div class="training-container">
        <div class="training-section">
            <h2>Taurus Learning and Training</h2>
            <p>Taurus offers everything you need to prepare for your certification exam. Explore training developed by Taurus with options that fit various learning styles and timelines.</p>
            <div class="testing-buttons">
                <select class="course-dropdown">
                    <option value="">Select a Course</option>
                    <option value="course1">Course 1</option>
                    <option value="course2">Course 2</option>
                    <option value="course3">Course 3</option>
                    <option value="course4">Course 4</option>
                    <option value="course5">Course 5</option>
                    <option value="course6">Course 6</option>
                </select>
                <button class="testing-btn">View All</button>
            </div>
            <h2>Taurus Testing Options</h2>
            <div class="training-buttons">
                <button class="training-btn">Online Testing</button>
                <button class="training-btn">In-Person Training</button>
            </div>
        </div>
    </div>

    <div class="about-container">
        <h2>About Us</h2>
        <p class="about-description">We provide learning solutions that are industry-focused, helping professionals and organizations enhance their skills and achieve their goals.</p>
        <div class="contact-info">
            <h3>Contact Information</h3>
            <p><strong>Address:</strong> 123 Learning Street, Education City, EC 45678</p>
            <p><strong>Email:</strong> info@tauruslearning.com</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
        </div>
    </div>

</body>

</html>
