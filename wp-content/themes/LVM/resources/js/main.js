document.addEventListener("DOMContentLoaded", () => {
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
});