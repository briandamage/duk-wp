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
	define('DB_NAME', 'd01f917b');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'd01f917b');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'YH7D4XVLeff34R5w');
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
define('AUTH_KEY',         '86HFX,wF+18hvI-P`?5D!]OVT>Yk-O#+7Q=VnRe HreWByZ?;Pmnb!*Pk+eLe@-*');
define('SECURE_AUTH_KEY',  'YaA<@w7oP+`~8Ne6Wcof|OC ^;MxejAz55*#[ h*$/8Q,a]q3aLjk*e SRg,}+Ni');
define('LOGGED_IN_KEY',    ',zR7]Q%8wZ}yey;*Wz8.[Q?}%IY6${k]dh:?]iky#~tpEU0QaZziae|Q#0:q9Xqy');
define('NONCE_KEY',        'qmx2 B?}relWRwQ)kG_[b5$;~Yd`7 _J]QK:jeEZ@1D@CG-Z|Os(/zLi`c[GR[-C');
define('AUTH_SALT',        '#bdLK]B28>G+PK> 8~[2e;BgjBxltPv69WFe44C)Q5?`Z2y]%1G~S[}LYS*N(_94');
define('SECURE_AUTH_SALT', 'I|-$;$->ZIEi@ul&<qP|p8Wf2Ovn;C&vCJd;hg_(-1w~!wCOb%2kOMb!1x|-`+w~');
define('LOGGED_IN_SALT',   'I@Ex<f3sljcHSpeRp^Vb<aMofj2EOJ`&DF!(`z4TJ7|:,OC]ZGjp?>@:?IS(Vi+M');
define('NONCE_SALT',       'DJTvM<-bV@GXq2)7g./W.jps(f2|nO|8!e2B;4.u%db_oUO4;<v@Gui;];J4ig:0');

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
