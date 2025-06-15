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

