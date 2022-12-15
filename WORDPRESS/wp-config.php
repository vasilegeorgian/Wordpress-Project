<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hp_33059250_wp512' );
/** MySQL database username */
define( 'DB_USER', '33059250_9' );
/** MySQL database password */
define( 'DB_PASSWORD', '72B)@6SdQp' );
/** MySQL hostname */
define( 'DB_HOST', 'sql203.byetcluster.com' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'clyamgolhgvpkvexcxp1k1fshlnw444ytneqa9jz7okgdjistabvfp0qflbadrzm' );
define( 'SECURE_AUTH_KEY',  'omrn285d4wwn9mhdzvro00tmaeezwrazi0frqyzgtdzccnhddjuphferugyr0frd' );
define( 'LOGGED_IN_KEY',    'ryqlx5cznrjpvfyhpkvabqoo8vbvev72rmabvzwuo9kqm6aohmixu9avc4dpkkod' );
define( 'NONCE_KEY',        '0dnupzcpxmpytv5lthxsruxfscnsfklxmrv7rrzi8ruq7fyv6epgx7oyueyj1htl' );
define( 'AUTH_SALT',        'ilocpj3dkosf39zcnexghxxnewalppd2qrmcygf8e2jqhipbasubbyw766tqicut' );
define( 'SECURE_AUTH_SALT', 'yeqjowy58yg8f0quflzwka3o9lp6blbbaeddexysjezdzvzqc5mhxhykd7z1ulez' );
define( 'LOGGED_IN_SALT',   'ldu5l9iafqg1lswevbadv3y0klyl10z9vv6nxv5zmgobpue3bu3morw4faezgtvy' );
define( 'NONCE_SALT',       'akobxs4ebsppcfbtjwmgzpwsw1lpvg5g5aycwcrrkaoq3mlhrdylkwbdsqtoycjc' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpgg_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* Add any custom values between this line and the "stop editing" line. */
define( 'DUPLICATOR_AUTH_KEY', 'E._2|ojDn?[>3B}N i2}7)QSMFWmj%4/OW*<9g+ Am:G#(GoU&vFY3P-^nu>m+F;' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
