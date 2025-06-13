const form = {
    init() {
        this.formElt = document.querySelector('.form');
        this.addEventListeners();
    },
    addEventListeners() {
        this.formElt.addEventListener('submit', (e) => {
            e.preventDefault();
        })
    }
}