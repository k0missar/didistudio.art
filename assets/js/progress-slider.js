window.addEventListener('DOMContentLoaded', ()=> {
    let progressSlider = null;

    function initOrDestroyProgressSlider() {
        const windowWidth = window.innerWidth;

        if (windowWidth <= 700 && progressSlider === null) {
            progressSlider = new Swiper('.js-progress-slider', {
                loop: true,
                slidesPerView: 'auto',
                spaceBetween: 10,
                observer: true,
                observeParents: true,
                observeSlideChildren: true,
                resizeObserver: true,
            })
        } else if (windowWidth > 700 && progressSlider !== null) {
            progressSlider.destroy(true, true);
            progressSlider = null;
        }
    }

    initOrDestroyProgressSlider();

    window.addEventListener('resize', () => {
        clearTimeout(window.progressSliderTimeout);
        window.progressSliderTimeout = setTimeout(initOrDestroyProgressSlider, 200);
    });
})