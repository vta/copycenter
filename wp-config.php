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
define('DB_NAME', 'copycenter');

/** MySQL database username */
define('DB_USER', 'kopykat');

/** MySQL database password */
define('DB_PASSWORD', 'K0pyC@ts');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Define direct SSH file transfer access */
define('FS_METHOD','direct');

/** Define group write permissions for web group */
define('FS_CHMOD_DIR',0775);
define('FS_CHMOD_FILE',0664);

/** Define Uploads directory */
define('WP_TEMP_DIR',(__DIR__).'/wp-content/uploads');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9wJ|Vgb7QB$b<TDW-k ~ s@XuE^[$6s0^Hkj)A-En3NZ6:1b4sJ+dQgPk!*,`7~E');
define('SECURE_AUTH_KEY',  'TsF1J5=1yjFIov^ThWmSrQG3B~Gf@6gOiQc!PM%_SrJi--u8&kG+z~whLRgtp72^');
define('LOGGED_IN_KEY',    'z`t5hH:5Rq>195F:Za7]u*)G,JorGA4]e&T)$b!N;}3cW(Va;2KU%C+e|Tl,/Fn@');
define('NONCE_KEY',        '}T;lQ|d,9iD`**5GwAe2S>f!gt*]_k38UmVpw`&cJfuPMy9M#!^WMsGyA8@KX<|T');
define('AUTH_SALT',        'z:$3rgX|caRg0:b@F%z.YH[aKgDEF*|#[135GlGG;p^h<cv6C_Tax!iE0K4xg60e');
define('SECURE_AUTH_SALT', '4c79=&`>_%x%~X]yn}auIzBxKH4q%UrSYVx0ZYiJT6*kMmkZ.||t%Wp&yTYgEw2Q');
define('LOGGED_IN_SALT',   ',vc~;^n`=<vjb3rPvv?/dM3AGB}RFgx,1F5+j;F-lzwd4=SdPQ@akB(rMjvf4:(}');
define('NONCE_SALT',       '{@Y!cMEHk41p,O@=i,gguf%fA43j7DV!fWL_gwAIdwMrrtaS@y0)Q cisz{<jE@?');

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
// Enable WP_DEBUG mode
define('WP_DEBUG', true);
// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);
// Disable display of errors and warnings
define('WP_DEBUG_DISPLAY', true);
define('SCRIPT_DEBUG', true);
// Saves the database queries to an array and that array can be displayed to help analyze those queries
define('SAVEQUERIES', true);


define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
