
// СКРИПТ ДЛЯ РАЗРАБОТКИ
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