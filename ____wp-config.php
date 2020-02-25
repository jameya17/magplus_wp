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
define('DB_NAME', 'wp121');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Wn[Bt)4=cWU;k/RQ#v8(zb5HbQNbBB,;nZnw]1GZ2Aa2m#=3EUg-{agrc;Q.3t1]');
define('SECURE_AUTH_KEY',  'q(F2NXaJlJ%6&u0I=j&@&K|vKr*1..:^#u`0#KJsf=O%L#CJQs ,WlKOzNJei|;Z');
define('LOGGED_IN_KEY',    'j=t!(u/YVPf62)2-PD-/oQHQ*T-mqQ[^A`++Um&Yz(.=D/n9ok)LD^}(/m/Wsah4');
define('NONCE_KEY',        '#Y[ckI|)!p4H,/p>2.vb8sg=|(M&Q@FWE~IqT}|J^N5 5g!u<EwJ[w*q++0SXXc_');
define('AUTH_SALT',        '7xAXp%Q^rVgQsmO!dda5bn&#3.]+|TTE9-|*(28I=E1;Bsrg* S*/DyLczA(3x_g');
define('SECURE_AUTH_SALT', '[Z=B!d9@J0$fLXG%$taz1fmzg!WTL1qhl:T2$6(GWM3xGx[1fHq.qJb$TB{Sp`<m');
define('LOGGED_IN_SALT',   '+t%zusT3n^7OEr%$F-O>n1KPvRg^mD-q2|[gl,kEX% mVg@1Hu</Qg*H,[( _F#(');
define('NONCE_SALT',       'o.kXVaYqURD]_O&%XMM #eNSKB& MI[:M}.CZT~4QDjk-@bPOYahstm+%YgR/mwn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
