<?php
define('WP_CACHE', true);
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
define( 'DB_NAME', 'botolati' );

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
define( 'AUTH_KEY',         '{(l&J(7aer`#![3jRg5P|>lC6+eu_Y,F/XS3F&~nY3SVQAOg0e|,|RS&DFGB4b>s' );
define( 'SECURE_AUTH_KEY',  'dI4Q #kQYinB-4K dE+7Wf]&&`8E1+5i0S2`jZ?<9NLmRqQwQGYAj#zTp1.~H&/O' );
define( 'LOGGED_IN_KEY',    'jA#-=Giaa(,B9_G{y[W0=e6wN+!LwN;FcQd$>o_2<:y}BsGn?9+G- xkC^T_Y^|j' );
define( 'NONCE_KEY',        '30.WV8R?sSb]Fh*ZoHlU/_X0Sg{+9(5VU^6p+K(O >`J%p(X!(_$L.O-m6T.9*s$' );
define( 'AUTH_SALT',        ',L/l*.9`BD#_q_P!8ng-e]ir(VVHlT2&`=u: 7W=<6jBd-PN1Oc`HG^I>#MmaF:-' );
define( 'SECURE_AUTH_SALT', '^(L3@PZmU1Grjt 8p|Gj11jtl4W~f0ZsW[oYJ7|X3{R<Aei)G(&:z3?3[rD@ygg~' );
define( 'LOGGED_IN_SALT',   '`klp}]rKG%DLryH^6/>b2aT{oL j4T?6yx~YL1RV,<*ISB~aBP[Rv<,81=?yPwY[' );
define( 'NONCE_SALT',       'c8>t+hiwiYd Sy2F}C<f_dH=ed3;+KTIy/N}4!z&$^q^9,0{B<;h=HW[4 eG4bmt' );

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
