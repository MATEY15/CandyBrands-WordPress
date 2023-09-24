<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp-candy' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'D`k9<ANsC3CKR!wU<{nVt)B3KT>>/)TZ<K#H{UT#T/X,vKi9/N|P%Kzc.E^X;dS6' );
define( 'SECURE_AUTH_KEY',  'e)yzgm}<]6r%o~2l>`+9_zn;*ND%1I{go=M^f{LaN7UqC*o*c&7L,;7).g=eW,2r' );
define( 'LOGGED_IN_KEY',    'LD/,]sRa83?w3MYSf!8eWq{=nEaaFuzFFe2rhP2N%.4K4b$e;W6GqW 9Iy&^VIFU' );
define( 'NONCE_KEY',        'PLq[N.QLW{-am,nW53a<^#M+JJTFALkCmVC=-EZ9)t5Eo.[=r&X-w?!emMO:sg1 ' );
define( 'AUTH_SALT',        'l2E7@T+[|3P=;b<)dP9zV(nWT:}2aiS#t#SxA.<CZ~J=98=B:F1(tdC(+UF: F&>' );
define( 'SECURE_AUTH_SALT', '6^J=.Ww=qWGK~u[~{h4Ge+W vMTRZ-^!>_;!Vq?vq47h<kmTA]<%3:!#NZrS_;=z' );
define( 'LOGGED_IN_SALT',   '-iNp%hfLvxuj|N4j67r1IXRk@3):U#C5OZ!O;?v1VOJlk@yb!v7!aZ;+c0?vv&fB' );
define( 'NONCE_SALT',       'K2bq&+Uk_C|h=~ud<aZC*vnz&S!Da,<WzW2r_*l#bG5Bi|x[+Uu<8a?$5j#$/gb]' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
