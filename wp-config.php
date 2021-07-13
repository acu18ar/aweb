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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/var/www/wordpress/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'webab_02' );

/** MySQL database username */
define( 'DB_USER', 'webdbadmin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Webabdb2l%' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SNiGI|8A=f22bm@2=`bt)KWid,s6/58NU3QH#*%1zddptu:gdvzsN%nyi5cP!(0Q' );
define( 'SECURE_AUTH_KEY',  'S75dgS) Z/_<MGY_kV}7CcoQHr/jY>j/m:kEIC1gO7,AK_5o`B:N1}[)M%#0yb}s' );
define( 'LOGGED_IN_KEY',    'SETL(D3y[O2@^LvtQ6K;W5] Y1ND{2G8p_vGnzzR#I~oH Jkge>-Y80Va/>%S%AM' );
define( 'NONCE_KEY',        'PUNL8ea=dT+cHbOc,eA>3Fkzpy<fMVjt&P&SvP=S28`ARgaf(pw }4Z-Tn6{xlAJ' );
define( 'AUTH_SALT',        '<SE$S6gspA8=o5yvs;i+2nk%hNVQ5NNNRBY6^fuK.btC#KOR8^nKxbqQ,_;b*{{r' );
define( 'SECURE_AUTH_SALT', '$=B+GVC)Grq4rN^IypCxJV5x-,y_|i~1O{Lx7)$$3$,_k=}JFdTlDj+lizob3 #4' );
define( 'LOGGED_IN_SALT',   'ES5c6R$XAD2}==9H;zyw5bckp!dd,^9A7Le*M^l2P{k*|D,(0@);T3gH<;e9ud=!' );
define( 'NONCE_SALT',       '(H_IVv8/JTfPn~2|2a?0H~t`&c|ecO/7Q,RMh1;qJ&q=tIHu-p)rqYekze.vA6O8' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
