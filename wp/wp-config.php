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
define( 'DB_NAME', 'wp1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '1}3<S?pz:VMPOI,5[-OS=&nS@=,D;o1K[U}3#]&cQn*j_|;=S7Mg*e/vxO6hnoy;' );
define( 'SECURE_AUTH_KEY',  'd6h?&9Ht@J%kv],RX#krX9J]LeCaN`.qhu/9iSZ#wZ/=]ZF*`aTg~2;hvY@TK-<2' );
define( 'LOGGED_IN_KEY',    'G0_E!T8ENQ4aDfn7nv_S|?G)@G^Ka=2N^i^1.U4?((^W]i?y>9$KKn.W$Y`kcMHK' );
define( 'NONCE_KEY',        'H&+S+hY0<.cZVCrK3HW*pSRD>pc?L=}+yT]:MMdvboP%)/.[V?97DWi.Cu4;JM@V' );
define( 'AUTH_SALT',        '<K!/#YX;),r{XG3$?y4!lQx7.uP!s/Lvhn8(Zb%ahj=lr9;+/_o>#a+cps1uYJG[' );
define( 'SECURE_AUTH_SALT', '=kTr^75;gwmn_)qa_dX)`fn[v#12@lcoIr9-q|.,fu?h7:GoZjLU`isG;h1t<TAY' );
define( 'LOGGED_IN_SALT',   'KB?,ZUrKk+<B;P#rS*dC]MPXmMjD+%arIR)OPbIT`h7?Z<rAo{eBjF,{bmw7 I*l' );
define( 'NONCE_SALT',       '_8)&`<taV;Fi~@qmE90U$nIwlio[IkhQ0kv}cx7CeN#p]tCP92.%GN@g!>sm9Gee' );

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
