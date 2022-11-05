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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'IcFHK!A1aqIGf]LR' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '~wRAl^MPK6`}2],#i_{YL,hN/:>6H/(X2Dv;9;X*+}Uz.W30scHYK@$/+TTEGQv{' );
define( 'SECURE_AUTH_KEY',  '`&9qK6s6pgC+_^eT_8AR/S3GZIaBL/[N&M}26BN/0;O$Xgn$8UmQ1Blb8<sbyU)_' );
define( 'LOGGED_IN_KEY',    '{X2gg%_We{c~%+1`!5=Buj0tI|7:OKE,l#g2`iZjtm26h$=AJs4u2Bjv[p/Ch5VE' );
define( 'NONCE_KEY',        'kJrOa?ME8,r4m-Z_*@Z^0-AMY{cI_^XCha2YcoQ3g<&~wI!pxu?6L9pk<x.yx$dq' );
define( 'AUTH_SALT',        't|]b_.s/?HuyUSo!Yq7C|D>^i-D<r3m4cQ0cC8.JlSCMItA.Sjs)nzcz_{n*[kr~' );
define( 'SECURE_AUTH_SALT', ']b9fJvbo!zYNSpS+j#3[J G&v}C9jM:9R+wwQ8wS{Ql#!G$]:-}x46*OAG3n F-P' );
define( 'LOGGED_IN_SALT',   'H`6r_:WD7LUH[c0com|-]dX-&NVm#}|}`)8!^5,X!o:lUu)oar7on76/pB<6zf.J' );
define( 'NONCE_SALT',       'L2{O|<*RHViL%mp{f,k7kY0y9QmaqNE3y@V9Clg C}>1ku~?:zU|f>8>/%TnF3gU' );

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
