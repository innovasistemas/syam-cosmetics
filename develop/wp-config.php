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
define( 'DB_NAME', 'wordpress_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'o=f%5/KC}dKUDX3`8F2dYsFR}tW.[!=wn/X@!B*;sqx)j1h<4.U1}QEQdL##Ia,z' );
define( 'SECURE_AUTH_KEY',  '7$bmZYDo%Co,TxOqp OnahobZCJ7x{3ocW($(mOUM+M~M>=rYB>fK;{0h1Qto<.7' );
define( 'LOGGED_IN_KEY',    'NsxN{zsC`^F-c<4fzjdKz(:i`234UM8.Y+O+s_nDyka<kg&YUG>_~.K+4_1Z`}dt' );
define( 'NONCE_KEY',        ';KgL59Yv_gr@x4^&AA}z*&^B]fWJPv8&0`!!=#|sjor:adR@%6~g5f5RJ#u[Wpbw' );
define( 'AUTH_SALT',        'y.A-=(Wg;/<JmK1gNB)TEev}YzLA6l/TorBby]]3QhohQSw h:,lZss40.;<z.ak' );
define( 'SECURE_AUTH_SALT', '} HUf(cXY+.#rL{Lur}NpIQem)aqFI,ag@At$/)t!~2dDBvrP$X$Iwv$K?|6}Y}c' );
define( 'LOGGED_IN_SALT',   'VSQPwK1XR#r1ae5-3g2cSQr+,h>F;y~K~,YSfHSKv(}~PVsW9w*x ]Ll0[V&O:S@' );
define( 'NONCE_SALT',       'NM7^p~6)M+.td4M][>^=}&{xVs#f4{0fnS,T_ V[?#lVI>$c.Mqg3WFh[z>mb`80' );

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
