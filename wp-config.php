<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'intern_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345678');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_DEBUG', true);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&_%9wLxX]qx#u&Y!CumyXM4T.@K#Lj6l]w1|qZlo7BkCt`4%5/%a4qenDjK2rR~[');
define('SECURE_AUTH_KEY',  'BeZV4T<Vc5;S*^G82>Af0OLwrkUz=WzFNscZ_F1l7mRz.KU@UwfUW$$^No)RUb*z');
define('LOGGED_IN_KEY',    '^pWtRX1uX2u^<rf:W4B%pgWX]4aILqwqR;hi(50,[%^tm7Nm/<GNoilb4:X^Mf_i');
define('NONCE_KEY',        'n5),K$$AiMNsqRbd]DcN78!}Xg^0Q=&j`4M?]G-[oj`@>wAgXoC?f74VTxe%ffq>');
define('AUTH_SALT',        '2w$!4%Hfj7#z<+;Vkf6M0Zr-Nup*{nO0>R&9TgxATCo(~+d/=9R-LVT0=4 aPoBy');
define('SECURE_AUTH_SALT', '+~xP 540PZYYY;X2{[36hafjm7g8Z/[f?BL)0u7* `CSb2N36GcaHS[@Wo;VqH9)');
define('LOGGED_IN_SALT',   '*8TTr&}RUhs~P=iodse^>d$u|*VM|]M:b5u2vbiGDB2v2uAj6qYfm>oo{P[m=.lm');
define('NONCE_SALT',       'JzU^@pgUIsR9%<H8P[W%d*]Ur`[lk-Z3X<J826e:tc q=slK]TWk_*J5pM2W_tiq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
