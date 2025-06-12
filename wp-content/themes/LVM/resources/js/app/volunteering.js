document.addEventListener('DOMContentLoaded',  () =>{
    const slider = document.querySelector('.volunteering__right');
    let isDown = false;
    let startX;
    let scrollLeft;
    let velX = 0;
    let momentumID;

    // Drag start
    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('dragging');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
        cancelAnimationFrame(momentumID); // stop any momentum
    });

    // Drag end
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('dragging');
        momentumScroll(); // start momentum when released
    });

    // Mouse leaves slider
    slider.addEventListener('mouseleave', () => {
        if (isDown) {
            isDown = false;
            slider.classList.remove('dragging');
            momentumScroll();
        }
    });

    // Mouse move
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX);
        slider.scrollLeft = scrollLeft - walk;
        velX = walk - velX; // save movement speed for momentum
    });

    // Smooth momentum scroll effect
    function momentumScroll() {
        velX *= 0.9; // friction
        if (Math.abs(velX) > 0.5) {
            slider.scrollLeft -= velX;
            momentumID = requestAnimationFrame(momentumScroll);
        }
    }
});
