<?php
/*ff700*/


/*ff700*/
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
define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/HEROKU/www.magplus.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'magplus_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
//define('DB_CHARSET', 'utf8mb4');
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define( 'AS3CF_AWS_ACCESS_KEY_ID',     'AKIAINPIT2RL4LKN3YFA' );
define( 'AS3CF_AWS_SECRET_ACCESS_KEY', '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' );

//define("WP_CONTENT_URL", "https://www.magplus.com/");
//define("COOKIE_DOMAIN", "www.magplus.com/");


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cfmQ=S9=lHJz}.]|v@[/S}mK7;L{G)&T6oAVTs{g0z_<GO>3 93xc!eG$fY9c@_+');
define('SECURE_AUTH_KEY',  'l4u1jwN0d0stC3R0:TX$QFp;iTAV*~+[sh@AB+:|.iVMKFc}T5jW!bEmlq>Z!ssE');
define('LOGGED_IN_KEY',    '1Bry1NK[7GXc>nPi4:Q-*1YLifci;V;/_:E6YE)BPtO<qcf:+F[lol8qoMv2e8<E');
define('NONCE_KEY',        'VV/Sq^&roCpr5RozY(6PIG!phB/RJpJUS#Nu:Uv}:_MNitj!}}&At1cQsKRJK7<G');
define('AUTH_SALT',        'f8Z&KuhTXJ&&4xZ5]_61+qk%Mc-uv_VFf]@_xM:N5LjGkI`X9Zn.&3aPqcFNI.qO');
define('SECURE_AUTH_SALT', 'R%Fc/`|fN&T_[Kv/?u@G/Ta%aid9$iP<Z aQH|&WKF^1QxGYF{J6<HpB_i`!x=X7');
define('LOGGED_IN_SALT',   '/o)[h_/C]%<z-{Q5avngo=fE[xscy 01ifa~>(7Zk3JL^Z~*1mya(b|q{00yi9qN');
define('NONCE_SALT',       'Ae9.<rfv@{^?(vaQ,UDFT(wXQ=W<p{h@#a!i7ob92QS0qh9#Su{23|O@3rT}]C>O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mv2_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
