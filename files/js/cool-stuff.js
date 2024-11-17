document.addEventListener('DOMContentLoaded', () => {
    // Select all images inside the .show-images container
    const images = document.querySelectorAll('.show-images img');

    // Create an IntersectionObserver to watch when images enter or leave the viewport
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // When the image enters the viewport, add 'visible' class
                entry.target.classList.add('visible');
                entry.target.classList.remove('hidden'); // Ensure 'hidden' class is removed
            } else {
                // When the image leaves the viewport, add 'hidden' class
                entry.target.classList.remove('visible');
                entry.target.classList.add('hidden');
            }
        });
    }, { threshold: 0.5 }); // Trigger when 50% of the image is visible

    // Observe each image
    images.forEach(image => {
        observer.observe(image);
    });
});
