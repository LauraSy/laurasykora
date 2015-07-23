<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'laura_db');

/** MySQL database username */
define('DB_USER', 'laura');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'slG-dgqu5BaGO^],*O+e:1z+x%.hRw8WH-I!(fYA}Qp{nFV,)J/AloG:N<gd;Knf');
define('SECURE_AUTH_KEY',  'B|GU3yY1l&}DmTv-No<G&m-|*@`!ukIDMUfwZz8C.1!UjPS(@Q|R+9+JQNg=w<|b');
define('LOGGED_IN_KEY',    'aFN19E2FHC*P%,@^-oSr^,/Wy4u9`F(c#*/B6+>E]a6GUr*{Pnc/C!8CpeLGkZ${');
define('NONCE_KEY',        '~(]3]tr}eT+x#z,w=yQs&@C4e,=y+2OwGny)xQ4m@|VY{1D6D|tW0+nF-`gaJpx$');
define('AUTH_SALT',        'wf2h)2|OL1d$_<%HT72[>5z3DL/u=`D+!vyGIU}Yz$K[-Za|bEz,4t?b=VGhe? R');
define('SECURE_AUTH_SALT', 'Y( z+AXh`F`ur=x]6|#U/GG?,s0l`0Xn9;Bg-piVU|_qZ*eRfv.CjWixh_F6S;`[');
define('LOGGED_IN_SALT',   '3RLr~74|+pBOmqv* o6QzzSR=DxG4{ymm@OfcR;IRECQP|_QFE(Z5-Hk%{?gT0G1');
define('NONCE_SALT',       'Y]Eiy{]NZ6UA_E&APIy||A,nVQ <gUixNz5.Pd-pomx9)fS`>1Pg7OJOn|wp+hAl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
