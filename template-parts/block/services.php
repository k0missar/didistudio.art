<?php
    wp_enqueue_style('didistudio-art-block-services');
?>

<div class="service">
    <div class="service__wrapper wrapper">
        <div class="service__content">
            <h2 class="service__title h1">
                Услуги
            </h2>
            <div class="service__description">
                Наша команда стремится к успеху, тщательно анализируя сферу вашего бизнеса и рынок.
            </div>
        </div>
        <div class="service__price">
            <div class="service__price-block">
                <div class="service__price-title h2">
                    <label for="service-1" class="h2" data-count="01">
                        <span>Логотип</span>
                    </label>
                    <div class="service__price-icon">
                        <svg width="24" height="25">
                            <use href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#plus';?>"></use>
                        </svg>
                    </div>
                    <input type="checkbox" id="service-1" name="service-1">
                </div>
                <ul class="service__list">
                    <li class="service__item">
                        <span>Для компаний, продуктов и персональных брендов.</span>
                    </li>
                    <li class="service__item">
                        <span>Анализ существующего логотипа, варианты редизайна.</span>
                    </li>
                </ul>
            </div>
            <div class="service__price-block">
                <div class="service__price-title h2">
                    <label for="service-2" class="h2" data-count="02">
                        <span>Упаковка</span>
                    </label>
                    <div class="service__price-icon">
                        <svg width="24" height="25">
                            <use href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#plus';?>"></use>
                        </svg>
                    </div>
                    <input type="checkbox" id="service-2" name="service-2">
                </div>
                <ul class="service__list">
                    <li class="service__item">
                        <span>Для компаний, продуктов и персональных брендов.</span>
                    </li>
                    <li class="service__item">
                        <span>Анализ существующего логотипа, варианты редизайна.</span>
                    </li>
                </ul>
            </div>
            <div class="service__price-block">
                <div class="service__price-title h2">
                    <label for="service-3" class="h2" data-count="03">
                        <span>Айдентика</span>
                    </label>
                    <div class="service__price-icon">
                        <svg width="24" height="25">
                            <use href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#plus';?>"></use>
                        </svg>
                    </div>
                    <input type="checkbox" id="service-3" name="service-3">
                </div>
                <ul class="service__list">
                    <li class="service__item">
                        <span>Для компаний, продуктов и персональных брендов.</span>
                    </li>
                    <li class="service__item">
                        <span>Анализ существующего логотипа, варианты редизайна.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    const serviceList = document.querySelectorAll('.service__list')
    if (serviceList) {
        serviceList.forEach(item => {
            item.style.setProperty('--height', item.scrollHeight + 25 + 'px')
        })
    }
</script>
