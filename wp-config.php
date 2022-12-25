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
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', "gold" );

/** Имя пользователя MySQL */
define( 'DB_USER', "root" );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', "" );

/** Имя сервера MySQL */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         'ud7|%lTL|iV#vUEwwoySZ<6Mgau>7{12Mp o]7U^M;G.21<gFH4D_!BbZ X6w<,k' );
define( 'SECURE_AUTH_KEY',  'B$PT=P4pzMg&nX%HEcQ_Awm{~Q#dnpZ3&Jb=c}w~RehoJ7]L:OB()/G2WMJxWL*/' );
define( 'LOGGED_IN_KEY',    'gPP{xz)r& 4BO.b>Xg^k}{xK+l=CRhZtdl=og><u2XjEM0QRaBPVT>JjbRYBJa9Z' );
define( 'NONCE_KEY',        'DH8<p?j4Hag :sNi#>t+Xe3~K0]7Hl~3G:+]B|%+9; PO<!3pN`Rs>,X?`@~%717' );
define( 'AUTH_SALT',        'fOj<})a(`+,q_!k%0:~eNR0aI%bBuSt(iD^uK:W0%fG@Pz2HVdQUMKwk%2^,> 8M' );
define( 'SECURE_AUTH_SALT', '3NZx$_3l(pB0aUp:*B*Yk$Z?ff(N8VSkJu87%aX?.|HgyMCpJaUNl#:g_V-$|Y7f' );
define( 'LOGGED_IN_SALT',   '7`@IW_jN#Z]/c5fMtpD6>=^|iK F0H0Z%>V9,w=F$RVGWPHgN$CCzIoR#8!9t=N[' );
define( 'NONCE_SALT',       'C02x@Kb$^PZC5Yij3:4%`X10BaY.r.Hu*O=ofw4z_-y%T-|;L2jeCk;qn+zX(M|&' );

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
