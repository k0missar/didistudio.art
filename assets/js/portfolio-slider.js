window.addEventListener('DOMContentLoaded', () => {
    let portfolioSlider = null;

    function initOrDestroyPortfolioSlider() {
        const windowWidth = window.innerWidth;

        if (windowWidth <= 1200 && portfolioSlider === null) {
            portfolioSlider = new Swiper('.js-portfolio-slider', {
                loop: true,
                spaceBetween: 20,
                slidesPerView: 'auto',
                observer: true,
                observeParents: true,
                observeSlideChildren: true,
                resizeObserver: true,
            });
        } else if (windowWidth > 1200 && portfolioSlider !== null) {
            portfolioSlider.destroy(true, true);
            portfolioSlider = null;
        }
    }

    initOrDestroyPortfolioSlider();

    window.addEventListener('resize', () => {
        clearTimeout(window.portfolioSliderTimeout);
        window.portfolioSliderTimeout = setTimeout(initOrDestroyPortfolioSlider, 200);
    });
});