import gulp from 'gulp';
import dartSass from 'gulp-dart-sass'; // Подключение gulp-dart-sass
import concat from 'gulp-concat';
import del from 'del';
import gsize from 'gulp-size';
import browserSync from 'browser-sync';
import autoprefixer from 'gulp-autoprefixer';

// Пути к файлам
const paths = {
    watch: {
        styles: 'src/scss/**/*.scss',
        scripts: 'src/js/**/*.js',
        php: '*.php',
    },
    styles: {
        src: 'src/scss/**/*.scss',
        dest: 'assets/css/',
    },
    scripts: {
        src: 'src/js/**/*.js',
        dest: 'assets/js/',
    },
};

// Задача для обработки стилей с поддержкой Source Maps
function styles() {
    return gulp.src(paths.styles.src)
        .pipe(dartSass().on('error', dartSass.logError)) // Используем gulp-dart-sass {outputStyle: 'compressed'}
        .pipe(autoprefixer())
        .pipe(gulp.dest(paths.styles.dest))
        // .pipe(browserSync.stream())
        // .on('end', function() {
        //     console.log('Обновление стилей завершено, перезагружаем браузер...');
        //     browserSync.reload(); // Явный перезагруз после завершения обработки
        // });
}

// Задача для обработки скриптов
function scripts() {
    return gulp.src(paths.scripts.src)
        // .pipe(concat('script.min.js'))
        .pipe(gsize({ title: 'scripts', showFiles: true }))
        .pipe(gulp.dest(paths.scripts.dest))
        .pipe(browserSync.stream());
}

// Задача для обработки шрифтов
function fonts() {
    return gulp.src(paths.fonts.src)
        .pipe(gsize({ title: 'fonts', uncompressed: true }))
        .pipe(gulp.dest(paths.fonts.dest))
        .pipe(browserSync.stream());
}

// Задача для очистки каталога
function clean() {
    return del(['/assets/**/*.css', '/assets/**/*.js', '!/assets/fonts']);
}

// Задача для отслеживания изменений
function watch() {
    // browserSync.init({
    //     proxy: 'http://didistudio.wsl',  // Прокси сервер Apache
    //     port: 4000,                      // Новый порт для BrowserSync
    //     open: false,                     // Не открывать браузер автоматически
    //     notify: false,                   // Отключить уведомления
    //     reloadDelay: 1000,               // Задержка перед обновлением
    //     injectChanges: true,             // Внедрение изменений
    //     browser: 'firefox',               // Убедитесь, что браузер используется правильно
    // });
    gulp.watch(paths.watch.styles, styles);
    gulp.watch(paths.watch.scripts, scripts);
    //gulp.watch(paths.watch.php).on('change', browserSync.reload);
}

// Задача сборки
const build = gulp.series(
    clean,
    gulp.parallel(scripts, styles),
    watch
);

// Экспорт задач
export { clean, styles, scripts, watch, build };
export default build;
