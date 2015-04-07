<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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

define('DB_NAME', 'thuyluc_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'oeU|QOBxE4t_1u|JYp$BppTBXbRhgu7~uBd[]#-R7ufX!(E@MG-+czTD-dP=b`6:');
define('SECURE_AUTH_KEY',  'h!xEMMzcc}Gz55<BNjhA-K>-VKx:2U5GE%N>S x|?hf}1-i|q~&2d+OtMSzaO)~K');
define('LOGGED_IN_KEY',    '3VL,|jbt@gyx69)xn}4/+,7$uG9&m9L=[Ut^CQ}FMhbu-i+_%6RBig6d<YMc_v3+');
define('NONCE_KEY',        ';+}E fe1s<?OaBmdcb62C1a=Rs% Z%u~}m+5&rOHjGXdbwIlS(+&c`+}3;*rzX=4');
define('AUTH_SALT',        'xa|cu^Z>/e}@]FFwC(v~cJ|8&3&e&vuzcDKnJeqXY@ /=w]Img9/2;d=r/^U6~U0');
define('SECURE_AUTH_SALT', 'LxSno#XiC|44{.$?M2WJpD]0y>~8o!nQB+>89(b~A?4BN!ndrK$!ewH2Tt+h(#}B');
define('LOGGED_IN_SALT',   'p!2=Pkrtc$UbY/(!yKBP~|Jrj*;|~y2jrOy(3eg#;PT4!/S#(fK{)cKW,BZ,H.nP');
define('NONCE_SALT',       '`:B6^oI4c+Bf2!U$},Ni5A;i7_]Z-!5{M#_|SyK?KHOv*Rw(Z_Zhy=OY8nO]N+_.');

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
