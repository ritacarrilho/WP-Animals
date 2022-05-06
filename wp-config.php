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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ppbase' );

/** Database username */
define( 'DB_USER', 'ppwp' );

/** Database password */
define( 'DB_PASSWORD', 'master' );

/** Database hostname */
define( 'DB_HOST', 'database' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Rph%_K]Qng8,*]3AZ^g-.FzOe{KF2$?>Vnh#(c8wQGD1ihP;3u1^g#o <TY5=)a(' );
define( 'SECURE_AUTH_KEY',   '[xk:i!2Bf/~8= ewnv:7)v:>{vj@%l7A~A8;iOguK=n[{Z*E{n-p*U{Q~-|:^kx(' );
define( 'LOGGED_IN_KEY',     'zSqJAC<sn0>A#+altXd|54bKG[`BXuj^St`X|$ s?QTrc8Ibo [=g6nUucILmJ;b' );
define( 'NONCE_KEY',         ',N>%vv#g$wW[0&c[*Z}EF&sIOjboLB9RBQ-fV>&F.SHXI737F(>>UsH?.J?{&uWm' );
define( 'AUTH_SALT',         'z6W7#HPzpIc5DUenm^zuN#T=XsW&MWv(WitPyryY]/=H)4^uEqI!ZLDh#o/[}@j]' );
define( 'SECURE_AUTH_SALT',  'NlVWT|]$Q!jL/EAIfdPv&Pg00yJ#]f$0zD9%w _T?iFq3c40p^%^_>!B+4g0*`+w' );
define( 'LOGGED_IN_SALT',    'VP8j^stn!J*X{vz|T~uDxeS])(2>]b,#Y/Q#52/;euc0Q]sGUXbKXmB>Uao~& U!' );
define( 'NONCE_SALT',        '6)z{Je,FIJ%ryAz:fvs^uEE,*x3H)Ixd9R{j*G>W6aJ}RO=C9!2_o;l+eqB0erN5' );
define( 'WP_CACHE_KEY_SALT', 'yhXJA]NjYA{g_7;J1u=hki0AB(:(In:x]~B4]Z<@{(4rB(_>1?rh{gSYk?/)^ 9I' );


/**#@-*/

/**
 * WordPress database table prefix.
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


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
