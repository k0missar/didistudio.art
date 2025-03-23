<?php
wp_enqueue_style('didistudio-art-block-progress');
wp_enqueue_script('js-slider-progress');

//$arParam = [
//    'post_type' => 'portfolio',
//];
//
//$arResult = new WP_Query($arParam);
?>
<div class="progress">
    <div class="progress__wrapper wrapper">
        <div class="progress__header">
            <h2 class="progress__title h1">Достижения</h2>
            <div class="h2">
                В 2024 году мы много трудились и достигли больших успехов. Делимся ими с вами!
            </div>
        </div>
        <div class="progress__content">
            <div class="progress-slider js-progress-slider swiper">
                <ul class="progress__list swiper-wrapper">
                    <li class="progress__item swiper-slide" data-progress-count="01">
                        <span class="h2">4 из 20</span>
                        <p>
                            4 вина из 20 продаются в торговых сетях по всей стране.
                        </p>
                    </li>
                    <li class="progress__item swiper-slide" data-progress-count="02">
                        <span class="h2">4 из 20</span>
                        <p>
                            4 вина из 20 продаются в торговых сетях по всей стране.
                        </p>
                    </li>
                    <li class="progress__item swiper-slide" data-progress-count="03">
                        <span class="h2">4 из 20</span>
                        <p>
                            4 вина из 20 продаются в торговых сетях по всей стране.
                        </p>
                    </li>
                    <li class="progress__item swiper-slide" data-progress-count="04">
                        <span class="h2">4 из 20</span>
                        <p>
                            4 вина из 20 продаются в торговых сетях по всей стране.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>
