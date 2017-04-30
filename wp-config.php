<?php
/**
* Основные параметры WordPress.
*
* Скрипт для создания wp-config.php использует этот файл в процессе
* установки. Необязательно использовать веб-интерфейс, можно
* скопировать файл в "wp-config.php" и заполнить значения вручную.
*
* Этот файл содержит следующие параметры:
*
* * Настройки MySQL
* * Секретные ключи
* * Префикс таблиц базы данных
* * ABSPATH
*
* @link https://codex.wordpress.org/Editing_wp-config.php
*
* @package WordPress
*/

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/bolgar03/bolgaria-travel.com/www/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'bolgar03_db');

/** Имя пользователя MySQL */
define('DB_USER', 'bolgar03_db');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD','3VMNpHvH');

/** Имя сервера MySQL */
define('DB_HOST', 'bolgar03.mysql.ukraine.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
* Уникальные ключи и соли для аутентификации.
*
* Смените значение каждой константы на уникальную фразу.
* Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
* Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'C.wh3RUF2_5DvT$IJ/rR-_]bpb2.0Wc;]Pcxo}A~B:8pe&C1$kpA&!sW;9#lOe:L');
define('SECURE_AUTH_KEY',  'e)?!$o|HqHr}@^[6c/:E|04ZUf`;{lL2(H^B$_o::XY0z&P?so-er[fquIJk|xI`');
define('LOGGED_IN_KEY',    '1C($dl5&k+8Qdkg-3Sb8|k;[SfW.JsKA.7$m^Xh>2|]PNq,^%woJK6C0VPg|6E$f');
define('NONCE_KEY',        '+DUFYQNkHTm|YQD~xSWVQP0?LQ$` s|!7Dv4tV[Ngq<z&NM*5*f*cLLEJ1`*}sl]');
define('AUTH_SALT',        ':fWA6r5f~[VuuM<PM&rd8,/ADC;DB6-):8S}S|5.W;H6=T+#|Wi7wX[Z`u[IB|Fo');
define('SECURE_AUTH_SALT', '`J1LXw.H>-a#+4-;B9FFMD0*cQD) ^&I$k{rq#%xV WkJyM<m=j_Qo#Ol@_s,Fn:');
define('LOGGED_IN_SALT',   '4x{?u$32Hrx!D5OF]uP|e?dxr(LqTzNTUR9-$VEWjy+b=@p#,W`^|;Tc0x9;,v,7');
define('NONCE_SALT',       'U%],^[6X-.!Kx=B-A$-qczcL|+y0@bfh&xa%t^;,xBq=ypN*l9OLvOhsZ=Hqp,/U');

/**#@-*/

/**
* Префикс таблиц в базе данных WordPress.
*
* Можно установить несколько сайтов в одну базу данных, если использовать
* разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
*/
$table_prefix  = 'bol_';

/**
* Для разработчиков: Режим отладки WordPress.
*
* Измените это значение на true, чтобы включить отображение уведомлений при разработке.
* Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
* в своём рабочем окружении.
*
* Информацию о других отладочных константах можно найти в Кодексе.
*
* @link https://codex.wordpress.org/Debugging_in_WordPress
*/
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
