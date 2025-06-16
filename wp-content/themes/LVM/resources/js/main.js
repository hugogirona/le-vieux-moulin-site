(function () {


    document.addEventListener('DOMContentLoaded', () => {
        if (document.querySelector('.slider')) {
            class Slider {
                radios = document.querySelectorAll('input[name="slider"]');
                dots = document.querySelectorAll('.slider__dot');
                current = 0;
                max;

                autoplayInterval = null;
                resumeTimeout = null;
                constructor() {
                    this.max = this.radios.length;
                    this.startAutoplay();
                    this.dotSelectedByUser();
                }

                autoplay() {
                    this.radios.forEach(radio => radio.checked = false);
                    this.radios[this.current].checked = true;
                    this.current = (this.current + 1) % this.max;
                }

                startAutoplay = () => {
                    if (this.autoplayInterval) return; // déjà lancé
                    this.autoplayInterval = setInterval(this.autoplay.bind(this), 2000);
                }

                stopAutoplay() {
                    clearInterval(this.autoplayInterval);
                    this.autoplayInterval = null;
                }
                dotSelectedByUser() {
                    this.dots.forEach((dot, index) => {
                        dot.addEventListener("click", () => {
                            this.stopAutoplay(); // on stoppe l'autoplay
                            this.radios.forEach(r => r.checked = false);
                            this.radios[index].checked = true;
                            this.current = index;

                            // On prépare la reprise automatique après 5s
                            clearTimeout(this.resumeTimeout);
                            this.resumeTimeout = setTimeout(() => {
                                this.startAutoplay();
                            }, 5000);
                        });
                    });
                }
            }
            new Slider();
        }
    });

})();

(function () {
    if (document.querySelector('.faq__question')) {
        const faq = {

            group: document.querySelectorAll('.faq__item'),
            questions: document.querySelectorAll('.faq__question'),
            answers: document.querySelectorAll('.faq__answer'),
            arrows: document.querySelectorAll('.faq__arrow'),

            init() {
                this.addClosedClass();
                this.addEventListeners();
            },

            addClosedClass() {
                for (const answer of this.answers) {
                    answer.classList.add('faq__answer--closed');
                }
            },

            handleClassToggle(i) {
                this.answers[i].classList.toggle('faq__answer--open');
                this.answers[i].classList.toggle('faq__answer--closed');
                this.arrows[i].classList.toggle('faq__arrow--rotate');

            },

            addEventListeners() {
                for (let i = 0; i < this.group.length; i++) {
                    this.group[i].addEventListener('click', () => {
                        this.handleClassToggle(i);
                    });

                    this.arrows[i].addEventListener('click', () => {
                        this.handleClassToggle(i);
                    });
                }
            }
        }

        faq.init();
    }
})();


(function (){
    document.addEventListener('DOMContentLoaded',  () =>{

        if(document.querySelector('.volunteering__right')){
            class Volunteer {
                slider = document.querySelector('.volunteering__right');
                isDown = false;
                startX;
                scrollLeft;
                velX = 0;
                momentumID;
                constructor() {
                    this.addEventListeners();
                };


                addEventListeners() {
                    this.mouseDownCustom();
                    this.mouseUpCustom();
                    this.mouseMoveCustom();
                    this.mouseLeaveCustom();
                };

                mouseDownCustom() {
                    this.slider.addEventListener('mousedown', (e) => {
                        this.isDown = true;
                        this.slider.classList.add('dragging');
                        this.startX = e.pageX - this.slider.offsetLeft;
                        this.scrollLeft = this.slider.scrollLeft;
                        cancelAnimationFrame(this.momentumID);
                    });
                };

                mouseUpCustom() {
                    this.slider.addEventListener('mouseup', () => {
                        this.isDown = false;
                        this.slider.classList.remove('dragging');
                        this.momentumScroll();
                    });
                };

                mouseMoveCustom() {
                    this.slider.addEventListener('mousemove', (e) => {
                        if (!this.isDown) return;
                        e.preventDefault();
                        const x = e.pageX - this.slider.offsetLeft;
                        const walk = (x - this.startX);
                        this.slider.scrollLeft = this.scrollLeft - walk;
                        this.velX = walk - this.velX;
                    });
                };

                mouseLeaveCustom() {
                    this.slider.addEventListener('mouseleave', () => {
                        if (this.isDown) {
                            this.isDown = false;
                            this.slider.classList.remove('dragging');
                            this.momentumScroll();
                        }
                    });
                };

                momentumScroll = () => {
                    this.velX *= 0.9;
                    if (Math.abs(this.velX) > 0.5) {
                        this.slider.scrollLeft -= this.velX;
                        this.momentumID = requestAnimationFrame(this.momentumScroll);
                    }
                };
            }

            new Volunteer();
        }

    });
})();

