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
define( 'DB_NAME', 'wp_himchistka-mebeli' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '42.CxFkRXlB#>Gw=~E&nJ*4f,~9mZ~-)H1)Y76V}yIshPqpXnp#^p%2-aHGX^x*5' );
define( 'SECURE_AUTH_KEY',  'O!Th<nA2p>s~ 3D)p61V*(btpttAaN]k3CV,m*1bwBGEe|OQEeN3m76C;k/d%f0p' );
define( 'LOGGED_IN_KEY',    '?aUxI 9:bP>RJn]gF_#c^yZ(t8&NDapGMei~03IwJA:-6$  gKigZY.olmi)-E9=' );
define( 'NONCE_KEY',        '(.+$exG&_~E7Ph|a`6>a:I!&b;r;CJhGFunim${&wnnuB1p;#?D~#[B4*T=2Hy>e' );
define( 'AUTH_SALT',        '/A?Oda,;])O.|z#V:l+]r.7y{asH.ep56iq:w__x68AQMf;D7Xv:Zl_:*MR<@fic' );
define( 'SECURE_AUTH_SALT', '*Vhv:urBmT.bAgYu5Y{}AXUWb,t@QtsDrT$`.onD@-81+2~~CUbg|LtBoyS|f)5v' );
define( 'LOGGED_IN_SALT',   '^(!mtCI:hA]P&d| PU5rIjx~}TY#&3VHd}%{a{!B3aLs+W=i$K[lF0LT$ %)x802' );
define( 'NONCE_SALT',       'tk}V*iwS!%s5C903z-XzK)dQE.aDWyJ0?Su&`{.N3.6i?kapB weB+%E%~%_7Joh' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
