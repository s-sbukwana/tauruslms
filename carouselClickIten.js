document.addEventListener('DOMContentLoaded', function () {
    let currentIndex = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;
    const slideWidth = 100 / 4; // Show 4 slides at a time
    const intervalTime = 5000; // 5 seconds for auto-slide interval
    let autoSlideInterval;

    // Select course information container and its elements
    const courseInformationContainer = document.querySelector('.course-information-container');
    const toggleButton = courseInformationContainer.querySelector('.toggle-info');
    const additionalInfo = courseInformationContainer.querySelector('.additional-info');

    // Initial content
    const defaultContent = `
        Our comprehensive industry-focused courses are designed to provide in-depth knowledge and practical skills essential for success in today’s competitive market. With expert instructors, cutting-edge materials, and hands-on projects, our courses are tailored to meet industry standards and help you achieve your professional goals. Explore our 
        <a href="#course-catalog" class="course-link">course catalog</a> 
        to find the perfect program for your needs. For more information about our 
        <a href="#specializations" class="course-link">specializations</a> 
        and how they can benefit your career, visit our 
        <a href="#industry-insights" class="course-link">industry insights</a> 
        page.
    `;

    // Function to truncate text to a certain number of lines
    function truncateText(text, maxLines) {
        const lines = text.split('\n');
        return lines.slice(0, maxLines).join('\n') + (lines.length > maxLines ? '... ' : '');
    }

    // Set initial content
    additionalInfo.innerHTML = truncateText(defaultContent, 10); // Changed to 10 lines
    toggleButton.style.display = 'none'; // Initially hide the button

    // Function to load course information from a text file
    function loadCourseInfo(file) {
        fetch(file)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Failed to load file: ${file}`);
                }
                return response.text();
            })
            .then(text => {
                // Store the full content for later use
                additionalInfo.dataset.fullContent = text;
                additionalInfo.innerHTML = truncateText(text, 10); // Changed to 10 lines
                toggleButton.style.display = 'block'; // Show the toggle button when content is loaded
                additionalInfo.dataset.isExpanded = 'false'; // Track if expanded or not
            })
            .catch(error => {
                console.error(error);
                additionalInfo.innerHTML = '<p>Failed to load course information.</p>';
                toggleButton.style.display = 'none'; // Hide button if content fails to load
            });
    }

    // Function to scroll a small distance to the course information container
    function scrollToCourseInformation() {
        const containerRect = courseInformationContainer.getBoundingClientRect();
        const offset = window.pageYOffset + containerRect.top - (window.innerHeight / 4); // Adjust to make the container just visible
        window.scrollTo({
            top: offset,
            behavior: 'smooth'
        });
    }

    // Event listener for carousel items
    slides.forEach(item => {
        item.addEventListener('click', () => {
            // Remove 'selected' class from all items
            slides.forEach(i => i.classList.remove('selected'));

            // Add 'selected' class to the clicked item
            item.classList.add('selected');

            // Load course information
            const file = item.getAttribute('data-file');
            if (file) {
                loadCourseInfo(file);
            } else {
                // Reset to default content if no file is specified
                additionalInfo.innerHTML = truncateText(defaultContent, 10); // Changed to 10 lines
                toggleButton.style.display = 'none';
            }

            // Scroll to course information container
            scrollToCourseInformation();
        });
    });

    // Event listener for toggle button
    if (toggleButton) {
        toggleButton.addEventListener('click', () => {
            const isExpanded = additionalInfo.dataset.isExpanded === 'true';
            if (isExpanded) {
                // Collapse content
                additionalInfo.innerHTML = truncateText(additionalInfo.dataset.fullContent, 10) + ' <a href="#" class="toggle-info">Show More Information</a>';
                toggleButton.textContent = 'Show More Information';
                additionalInfo.dataset.isExpanded = 'false';
            } else {
                // Expand content
                additionalInfo.innerHTML = additionalInfo.dataset.fullContent;
                toggleButton.textContent = 'Show Less Information';
                additionalInfo.dataset.isExpanded = 'true';
            }
        });
    }

    // Function to show slides
    function showSlide(index) {
        if (index >= totalSlides - 4) {
            currentIndex = index - (totalSlides - 4); // Move back to start
        } else if (index < 0) {
            currentIndex = totalSlides - 4 + index; // Move to end
        } else {
            currentIndex = index;
        }
        const offset = -currentIndex * slideWidth; // Move by slide width
        document.querySelector('.carousel').style.transform = `translateX(${offset}%)`;
        updateDots();
    }

    function updateDots() {
        const dots = document.querySelectorAll('.dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === Math.floor(currentIndex / 4));
        });
    }

    function moveSlide(step) {
        showSlide(currentIndex + step);
    }

    function startCarousel() {
        showSlide(currentIndex);
        autoSlideInterval = setInterval(() => {
            moveSlide(1); // Automatically move to the next slide
        }, intervalTime);
    }

    function stopCarousel() {
        clearInterval(autoSlideInterval);
    }

    document.querySelector('.prev').addEventListener('click', () => {
        stopCarousel(); // Stop auto-slide on user interaction
        moveSlide(-1);
    });

    document.querySelector('.next').addEventListener('click', () => {
        stopCarousel(); // Stop auto-slide on user interaction
        moveSlide(1);
    });

    document.querySelectorAll('.dot').forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopCarousel(); // Stop auto-slide on user interaction
            showSlide(index * 4);
        });
    });

    startCarousel();
});

