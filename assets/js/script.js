const windowWidth = window.innerWidth;

const mBody = document.querySelector('body')
const menu = document.querySelector('.js-header-menu')
const menuBtn = document.querySelector('.js-menu-btn')
const menuCloseBtn = document.querySelector('.js-menu-close-btn')

if(menu && menuBtn && menuCloseBtn) {
    menuBtn.addEventListener('click', ()=> {
        menu.classList.add('header__menu--show')
        mBody.style.overflow = 'hidden'
    })

    menuCloseBtn.addEventListener('click', ()=> {
        menu.classList.remove('header__menu--show')
        mBody.style.overflow = 'auto'
    })
}

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
    let animationScrub = false
    if (windowWidth >= 700) {
        animationScrub = true
    }

    gsap.utils.toArray('.about-me__title, .js-about-me-content-block, .js-about-me-heading, .js-about-me-column, .about-me svg').forEach(item => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item, // Мы используем сам элемент .about-me__title для триггера
                start: 'bottom-=200 bottom', // анимация начинается, когда нижний край .about-me__title пересекает нижний край окна
                end: '+=400',
                scrub: animationScrub,
            },
            y: 200,
            opacity: 0,
            duration: 2,
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
            trigger: '.about-me__content img', // Мы используем сам элемент .about-me__title для триггера
            start: `bottom-=${start} bottom`, // -=${offset} анимация начинается, когда нижний край .about-me__title пересекает нижний край окна
            end: `+=${end}`,
            scrub: animationScrub,
        },
        y: 200,
        opacity: 0,
        duration: 2,
    });

    if (windowWidth >= 1200) {
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

    gsap.utils.toArray('.portfolio-block__description, .portfolio-block__link').forEach(item => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item, // Мы используем сам элемент .about-me__title для триггера
                start: 'bottom-=200 bottom', // анимация начинается, когда нижний край .about-me__title пересекает нижний край окна
                end: '+=400',
                scrub: animationScrub,
            },
            y: 200,
            duration: 2,
        });
    })

    gsap.from('.portfolio-slider__slide', {
        scrollTrigger: {
            trigger: '.portfolio-slider',
            start: 'top-=100 bottom',
            end: 'top top',
            scrub: animationScrub,
        },
        y: 100,
        opacity: 0,
        stagger: 0.5,
        duration: 2,
    })

    const servicePrice = document.querySelector('.service__price');
    if (servicePrice) {
        const servicePriceHeight = servicePrice.offsetHeight + 250;
        gsap.utils.toArray('.service__top-line, .service__bottom-line').forEach(item => {
            gsap.to(item, {
                scrollTrigger: {
                    trigger: servicePrice,
                    start: 'top-=100 bottom',
                    end: `top+=${servicePriceHeight} bottom`,
                    scrub: animationScrub,
                },
                width: 0,
                duration: 2,
            })
        })
    }

    const progressSlider = document.querySelector('.service__price');
    if (progressSlider) {
        const progressSliderHeight = progressSlider.offsetHeight + 250;
        console.log(progressSliderHeight)
        gsap.from('.progress__item', {
            scrollTrigger: {
                trigger: '.progress-slider',
                start: 'top-=100 bottom',
                end: `top+=${progressSliderHeight} bottom`,
                scrub: animationScrub,
            },
            y: 100,
            opacity: 0,
            stagger: 0.5,
            duration: 2,
        })
    }

    const footerContactList = document.querySelector('.footer__contact-list');
    if (footerContactList) {
        const footerContactListHeight = footerContactList.offsetHeight + 100;
        //const fullHeight = footerContactList.querySelector('.footer__contact-link').scrollHeight

        gsap.utils.toArray('.footer__contact-item').forEach(item => {
            const fullHeight = item.scrollHeight + 16;
            // console.log(fullHeight)
            gsap.fromTo(item,
                { height: 0, overflow: 'hidden' },
                {
                    height: fullHeight,
                    scrollTrigger: {
                        trigger: footerContactList,
                        start: 'top bottom',
                        end: `top+=${footerContactListHeight} bottom`,
                        scrub: animationScrub,
                    },
                    ease: 'none',
                    duration: 2,
                }
            );
        });
    }
});
