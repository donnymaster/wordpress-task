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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test_db' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'yW|m7@| xYLRE?aEK#_JcR?bAtYI0[8=@GD:H{[J.^ni{Uz;-EEvH(g91pSU;H+M' );
define( 'SECURE_AUTH_KEY',  'bm)0WeJ>P&_He+J`eym&xs=i:{eJdW(gQwsIe[-.^GHp(U<cU6x-$hL_?mOAvYQf' );
define( 'LOGGED_IN_KEY',    'v&6Dlh|y6N5r{h1%NywVZ=KsHd.{(Om`>2735FlgzXkg$6Syv/$4:;IDvS+ZkI%%' );
define( 'NONCE_KEY',        '-UyV W%YSa9R1SN0e,`H}$l05*ZCCo sno{aD0<$sN$vpE8&a{}gNS=B];]qQ>jN' );
define( 'AUTH_SALT',        'y(utwV-/6dzw5kmv4d8tqnqc/]d3t0d=*ycI3<B-+WQ)m1QabYDA28]*j+ckQE@*' );
define( 'SECURE_AUTH_SALT', '#y2hq@8kr[#,AaroH:;k<b|_YjF%:]M5?#4mR<1G?78r)Epzy0R6?4bF=|9^_|lo' );
define( 'LOGGED_IN_SALT',   'Rq _B`:<5I.U=k|f9.NdBhdC@g3oM9;!xW,.]K}|t#!xH97e?r<f<(u&JvdUGI@_' );
define( 'NONCE_SALT',       '`P#/7-nJu42R4!4=mWX@Hc9Qd=)j;ugVW_0TT-5dozSQ)2jGt_`e,aO`Ei^#Xvk]' );

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

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
