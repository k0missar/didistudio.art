const windowWidth = window.innerWidth;

const mBody = document.querySelector('body')

const serviceList = document.querySelectorAll('.service__list');

if (serviceList.length) {
    function serviceResize(padding = 0) {
        serviceList.forEach(item => {
            item.style.setProperty('--height', 'auto'); // сброс высоты
            const height = item.scrollHeight + padding + 'px';
            item.style.setProperty('--height', height);
        });
    }

    // Инициализация
    serviceResize(25);

    // Обновление на resize
    window.addEventListener('resize', () => serviceResize(25));
}

// GSAP
document.addEventListener("DOMContentLoaded", (event) => {
    gsap.registerPlugin(ScrollTrigger)
    // gsap code here!

    gsap.utils.toArray('.about-me__title, .js-about-me-content-block, .js-about-me-heading, .about-me__content-grid, .about-me svg').forEach(item => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: 'bottom-=200 bottom',
            },
            y: 200,
            opacity: 0,
            duration: 2,
            stagger: 1,
        });
    })

    let start = 200
    let end = 400
    if (windowWidth >= 700) {
        let start = 400
        let end = 200
    }
    gsap.from('.about-me__content img', {
        scrollTrigger: {
            trigger: '.about-me__content img',
            start: `bottom-=${start} bottom`,
        },
        y: 200,
        opacity: 0,
        duration: 2,
    });

    if (windowWidth >= 1200 && typeof ANIMATION !== 'undefined' && ANIMATION === true) {
        gsap.set('.logo', { height: 183 });
        gsap.to('.logo', {
            scrollTrigger: {
                trigger: 'body',
                start: 'top top',
                onUpdate: ScrollTrigger.refresh,
            },
            width: 120,
            height: 100,
            duration: 0.5,
        })
    }

    gsap.utils.toArray('.portfolio-block__title, .portfolio-block__description, .portfolio-block__link').forEach(item => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: 'bottom-=200 bottom',
            },
            y: 200,
            duration: 2,
        });
    })

    gsap.from('.portfolio-slider__slide', {
        scrollTrigger: {
            trigger: '.portfolio-slider',
            start: 'top-=100 bottom',
        },
        y: 100,
        opacity: 0,
        stagger: 0.5,
        duration: 2,
    })

    const servicePrice = document.querySelector('.service__price');
    if (servicePrice) {
        const servicePriceHeight = servicePrice.offsetHeight + 250;

        const lines = gsap.utils.toArray('.service__top-line, .service__bottom-line');

        gsap.to(lines, {
            scrollTrigger: {
                trigger: servicePrice,
                start: 'top-=100 bottom',
            },
            width: 0,
            stagger: 0.2,
            duration: 2,
        });
    }

    const progressSlider = document.querySelector('.service__price');
    if (progressSlider) {
        const progressSliderHeight = progressSlider.offsetHeight + 250;
        gsap.from('.progress__item', {
            scrollTrigger: {
                trigger: '.progress-slider',
                start: 'top-=100 bottom',
            },
            y: 100,
            opacity: 0,
            stagger: 0.5,
            duration: 2,
        })
    }

    const footerContactList = document.querySelector('.footer__contact-item');
    console.log(footerContactList)
    if (footerContactList) {
        const fullHeight = footerContactList.querySelector('.footer__contact-link').scrollHeight

        gsap.utils.toArray('.footer__contact-animation').forEach(item => {
            gsap.fromTo(item,
                { height: 0, overflow: 'hidden' },
                {
                    height: fullHeight,
                    scrollTrigger: {
                        trigger: item.closest('.footer__contact-item'),
                        start: `botto bottom`,
                    },
                    duration: 2,
                }
            );
        });


        const cardPortfolio = document.querySelectorAll('.archive.card-portfolio');

        if (cardPortfolio.length) {
            cardPortfolio.forEach(item => {
                const img = item.querySelector('.archive.card-portfolio__src');
                const imgAnimation = item.querySelector('.archive.card-portfolio__animation');
                const title = item.querySelector('.archive.card-portfolio__title');
                const description = item.querySelector('.archive.card-portfolio__description');
                const link = item.querySelector('.archive.card-portfolio__link');
                const number = item.querySelector('.js-animation-number');

                if (!img || !imgAnimation || !title || !description || !link) return;

                const imgHeight = img.scrollHeight;

                if (windowWidth >= 1200) {
                    gsap.fromTo(imgAnimation,
                        {height: 0},
                        {
                            scrollTrigger: {
                                trigger: item,
                                start: 'top bottom',
                            },
                            height: imgHeight,
                            duration: 2,
                        }
                    );

                    gsap.from([title, description, link], {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top bottom',
                        },
                        y: 200,
                        opacity: 0,
                        stagger: 0.25,
                        duration: 2,
                    });

                    gsap.from(number, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top+=40 bottom',
                        },
                        x: 200,
                        opacity: 0,
                        duration: 2,
                    });
                } else {
                    gsap.fromTo(imgAnimation,
                        {height: 0},
                        {
                            scrollTrigger: {
                                trigger: item,
                                start: 'top bottom',
                            },
                            height: imgHeight,
                            duration: 2,
                        }
                    );

                    gsap.from([title, description, link], {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top bottom',
                        },
                        x: 200,
                        opacity: 0,
                        stagger: 0.25,
                        duration: 2,
                    });

                    gsap.from(number, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top+=40 bottom',
                        },
                        x: -200,
                        opacity: 0,
                        duration: 2,
                    });
                }
            });
        }
    }

    // Мобильное меню появление и анимация
    const menu = document.querySelector('.js-header-menu')
    const menuBtn = document.querySelectorAll('.js-menu-btn')
    const menuCloseBtn = document.querySelector('.js-menu-close-btn')

    if(menu && menuBtn && menuCloseBtn) {
        menuBtn.forEach(btn => {
            btn.addEventListener('click', ()=> {
                menu.classList.add('header__menu--show')
                mBody.style.overflow = 'hidden'

                gsap.delayedCall(0.2, () => {
                    const itemAnimation = gsap.utils.toArray('.header__contact-mobile, .menu__link');
                    gsap.fromTo(itemAnimation,
                        {
                            x: 150,
                            opacity: 0,
                        },
                        {
                            x: 0,
                            opacity: 1,
                            stagger: 0.2,
                            duration: 1,
                        });
                });
            })
        })

        menuCloseBtn.addEventListener('click', ()=> {
            menu.classList.remove('header__menu--show')
            mBody.style.overflow = 'auto'
        })
    }

    menu.addEventListener('click', event => {
        target = event.target;
        if (target.closest('.menu__link') && menu.classList.contains('header__menu--show')) {
            menu.classList.remove('header__menu--show');
            mBody.style.overflow = 'auto'
        }
    })
});

const mobilePanel = document.querySelector('.js-mobile-panel');
const mainPanel = document.querySelector('.js-main-panel');

if (mobilePanel && mainPanel) {
    let lastScrollTop = 0;
    let isScrolling = false;

    window.addEventListener('scroll', function () {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Отменяем предыдущие события, если прокрутка не завершена
        if (isScrolling) return;

        isScrolling = true;

        requestAnimationFrame(function () {
            const mainPanelPosition = mainPanel.getBoundingClientRect();

            // Если прокручиваем вниз
            if (scrollTop > lastScrollTop) {
                // Скрываем мобильную панель, если основная панель полностью или частично видна
                //if (mainPanelPosition.bottom >= 0) {
                    mobilePanel.classList.remove('header__mobile-panel--show');
                //}
            } else {
                // Если прокручиваем вверх, показываем мобильную панель, если основная панель не видна
                if (mainPanelPosition.bottom < 0) {
                    mobilePanel.classList.add('header__mobile-panel--show');
                }
            }

            // Обновляем значение последнего скролла
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            isScrolling = false;
        });
    });
}

