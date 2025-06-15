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
