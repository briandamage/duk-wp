<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'duktor-wp');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'A#+]DR$r]ZS}sURy<?V2AwFe^w4@=C9_U-l6eGk+T&fel-]%!eg>P1:b(AjXsq<I');
define('SECURE_AUTH_KEY',  'J4lHguFi?BL5j|fhaKQ`{-4OT=|E o0E^%=yv.GeZ1;a~|SdN#YUmQy7uVyY%:Yl');
define('LOGGED_IN_KEY',    'a$.A{~YAIPESB-G_+)2RN&8w~~iJ9taW[~PS`L_}-;!5-L1bI1ncDjkVs4+f0j~l');
define('NONCE_KEY',        '=|b]!+<U{a,JZFvL#gR+ bDJ{eIa7tF30(<-x_XK9N;3v[60oaGnHq+w Rvc7kX+');
define('AUTH_SALT',        'aS}I|?66boYO$mmm&q2#TxyX,;RoB-{V_>qDAHgZ]K+JC}n~|+Hi?Jg!,[dSp@J-');
define('SECURE_AUTH_SALT', 'hI#~Wb_19+fHLh(_u:SIG|kn1;q_KIoC^YTszvo<dLBTz@7%_G|h:wA gNH|bG_Q');
define('LOGGED_IN_SALT',   '&HX/.QcJFP8@z0S$,/U-T$p7~2p]@)k&i8^&1xZYOF4}j1tje%E+W29LT0P+IM%i');
define('NONCE_SALT',       'VQs6e3bVv<)+v^zkxi2Wb-=-@Xm}!:D3v$+RO=t|@%fs8Z%x+]qYU]3tBH>;hO$n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
