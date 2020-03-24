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
define( 'DB_NAME', 'wpdesign' );

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
define( 'AUTH_KEY',         'wY*b QW=|r5 r%.?z3$:+}xB%-]<f97t.P@V|xii%o[.Q{PuN<!L%>8|K/M:ct@v' );
define( 'SECURE_AUTH_KEY',  'zfS{_[su5C%~_#WkY=T,Ivs_9P{`a%dO=``?ky;il|XTZBDwP01J<;-mp_n]/|0O' );
define( 'LOGGED_IN_KEY',    '-<0z4BX?wmV<KgF8+oh~9-sAQ|z}y;FMQF@]77Wm1kqsTU6JV^l@3?!(/n@f>OF;' );
define( 'NONCE_KEY',        'F^vzo5$<q$kxtn)fz+85r`(Ejj,hC:[LO%v?Z$j{=V)Zz{VBV>SPizBsc!=YvX#c' );
define( 'AUTH_SALT',        '9DnGrc.bGl}&pjb Jqj_iy9%(nlp{p=|9/6Q6p0bG:,L>GwS28vT|j8iAJKtB:)(' );
define( 'SECURE_AUTH_SALT', ' qT[?NSZ(aN0+djeQn,X.Q>FqS@T-J3~P^6KY3ziM{A&mOFn2!+?Jjt,1J9Wi!(;' );
define( 'LOGGED_IN_SALT',   'KDjQ{qo]j/t:} Nc`mtcF+O,U.LVh`|`S4,RR[ kc-X0C!AEq_%gy>B)xMirrO({' );
define( 'NONCE_SALT',       'QXQ{8=+6|9qw.cvSq!8` B^+pkqi1A9y!v] Ov-sUM(}&?2l8>Th>,)x^Xn.%v6$' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
