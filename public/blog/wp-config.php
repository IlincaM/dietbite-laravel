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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'ilinca');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* * #@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '[%eG;~FC.F|WQm<`rzy8(?U6z2CQJf|uy$pgUz=-<9 (n1]:`+1lz^Z!VE]ervHl');
define('SECURE_AUTH_KEY', 'jt}p{)U|1s>)f:7]Zc-fjM;YJ+~sP4m}Woz[<h+e%T;Ny1sf,FYL/.q5by_;>_!6');
define('LOGGED_IN_KEY', '4r=&4o+I@aC#%KX(_XUK_lI[a%>z#B0gw7Ugk)VGQBGxIR;deE^@>p&27w)yQ47D');
define('NONCE_KEY', 'KI(L%BmU3|X[^TS1?~@&rmMihpKu[M2CJ.Fs0k-UvZ;q<d5FrHX+Sl|*5NJ~FmdL');
define('AUTH_SALT', 'GI2*<M_0*JW|8jW=5E#g^LqCy-E+<Sg/~hGsoYZd0IuS+Dz=h-y -=FK&~vK#XWK');
define('SECURE_AUTH_SALT', 'F,YYubX|oJU<YCSWwyg|F|A=JOPGaH0m4tirilJw;Bxhs;}:1$.qn-Lg_@^x6lB=');
define('LOGGED_IN_SALT', 'WQmv=QG ;SQ+O>fQ4O:N<V^d&R* PK;r0/97jfYj%i,*4SYv1vXAK>(:R{3/tk^B');
define('NONCE_SALT', 'mXq>9^Pz!waw!Aqo$p$kzuuMU,c!5R+>RiK 9,K?nd=<V*]VCz Cw0Qqi&)A% |#');

/* * #@- */

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
define('WP_DEBUG', FALSE);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD', 'direct');

