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
define('DB_NAME', 'jeanlib223');

/** MySQL database username */
define('DB_USER', 'jeanlib223');

/** MySQL database password */
define('DB_PASSWORD', 'c5bn3j67mFd2');

/** MySQL hostname */
define('DB_HOST', 'jeanlib223.mysql.db:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '44VAnAl+VKDNY0j9QdPV9G3vnsIFhghuZkWMYX0Y/DHTNjlyU0olznRHDegY');
define('SECURE_AUTH_KEY',  'FcZ189wervkS8IqG01G872UiJqiVU0Hy5mzjtNKGKMYSVHV31d12M2D5FTBs');
define('LOGGED_IN_KEY',    'i2X3enfd5u9JGppqKR1FA8e68Vq2whxGUCblXo7yQVhYKYSXe2aBFDd5Z/ny');
define('NONCE_KEY',        'PXSUjnuzIwAVimBHFffkQiFO3t/ztUShpuPdRmNZpY/vYnxAF8prcMAzFJ7E');
define('AUTH_SALT',        'VMbw/cMC2yb6Z0q39qP20WG4BYEWZnBKjq31sMa3ylkWzM25zWXpa5PcE1cr');
define('SECURE_AUTH_SALT', '5LU0Zq1fcyo8PjEbairQ+6Di6r8rVhQV90brR0YZ4OaGCAZHDXH42J1087zD');
define('LOGGED_IN_SALT',   'ArfLZD4MSSP02S/buLIi7mvZp2jNBlaXIn9vVGXEnxQ/QNOU1RtSf21SoMvH');
define('NONCE_SALT',       'mK6SC0ecKvCnhum37lKkaoorviYTgG+TIwWbFrUPQ9ux59rSBzRMncwS68yR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wor2532_';

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

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
