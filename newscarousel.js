document.addEventListener('DOMContentLoaded', function () {
    const carousels = document.querySelectorAll('.new-carousel');

    carousels.forEach(carousel => {
        const slides = carousel.querySelectorAll('.new-carousel-item');
        const dots = carousel.parentElement.querySelectorAll('.new-dots-container .new-dot');
        let slideIndex = 0;

        function showSlide(index) {
            if (index >= slides.length) {
                slideIndex = 0;
            } else if (index < 0) {
                slideIndex = slides.length - 1;
            } else {
                slideIndex = index;
            }
            carousel.style.transform = `translateX(-${slideIndex * 100}%)`;
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === slideIndex);
            });
        }

        function moveSlide(step) {
            showSlide(slideIndex + step);
        }

        carousel.parentElement.querySelector('.new-prev').addEventListener('click', () => moveSlide(-1));
        carousel.parentElement.querySelector('.new-next').addEventListener('click', () => moveSlide(1));

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });

        // Optional: Auto slide every 5 seconds
        setInterval(() => moveSlide(1), 5000);

        // Initialize the first slide
        showSlide(slideIndex);
    });
});
