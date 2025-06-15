(function () {
    if (document.querySelector('.faq__question')) {
        const faq = {

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
    }
})();

