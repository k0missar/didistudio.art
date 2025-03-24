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

(function reloadWatcher() {
    let lastModified = null;

    async function checkForChanges() {
        try {
            const response = await fetch('/wp-content/themes/didistudio.art/reload.php');
            const newModified = await response.text();

            if (lastModified !== null && newModified !== lastModified) {
                console.log("Файлы изменились, перезагружаем страницу...");
                location.reload();
            }

            lastModified = newModified;
        } catch (error) {
            console.error("Ошибка при проверке изменений:", error);
        }
    }

    setInterval(checkForChanges, 500); // Проверка каждые 2 секунды
})();