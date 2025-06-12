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


if(document.querySelector('.slider')) {
    const radios = document.querySelectorAll('input[name="slider"]');
    const dots = document.querySelectorAll('.slider__dot');
    let current = 0;
    const max = radios.length;

    let autoplayInterval = null;
    let resumeTimeout = null;

// Fonction pour changer de slide automatiquement
    function autoplay() {
        radios.forEach(radio => radio.checked = false);
        radios[current].checked = true;
        current = (current + 1) % max;
    }

// Démarrer l'autoplay
    function startAutoplay() {
        if (autoplayInterval) return; // déjà lancé
        autoplayInterval = setInterval(autoplay, 2000);
    }

// Stopper l'autoplay
    function stopAutoplay() {
        clearInterval(autoplayInterval);
        autoplayInterval = null;
    }

// Quand l'utilisateur clique sur un dot
    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            stopAutoplay(); // on stoppe l'autoplay
            radios.forEach(r => r.checked = false);
            radios[index].checked = true;
            current = index;

            // On prépare la reprise automatique après 5s
            clearTimeout(resumeTimeout);
            resumeTimeout = setTimeout(() => {
                startAutoplay();
            }, 5000);
        });
    });

// Lancer l'autoplay au chargement
    startAutoplay();
}

if(document.querySelector('.faq__question')){
    (function (){
        const faq = {

            questions: document.querySelectorAll('.faq__question'),
            answers: document.querySelectorAll('.faq__answer'),
            arrows: document.querySelectorAll('.faq__arrow'),

            init(){
                this.addClosedClass();
                this.addEventListeners();
            },

            addClosedClass(){
                for (const answer of this.answers) {
                    answer.classList.add('faq__answer--closed');
                }
            },

            handleClassToggle(i) {
                this.answers[i].classList.toggle('faq__answer--open');
                this.answers[i].classList.toggle('faq__answer--closed');
                this.arrows[i].classList.toggle('faq__arrow--rotate');

            },

            addEventListeners(){
                for (let i = 0; i < this.questions.length; i++) {
                    this.questions[i].addEventListener('click', () => {
                        this.handleClassToggle(i);
                    });

                    this.arrows[i].addEventListener('click', () => {
                        this.handleClassToggle(i);
                    });
                }
            }
        }

        faq.init();
    })();
}

