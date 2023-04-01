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
define( 'DB_NAME', 'grassywp' );

/** MySQL database username */
define( 'DB_USER', 'simon' );

/** MySQL database password */
define( 'DB_PASSWORD', 'simon@2023' );

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
define( 'AUTH_KEY',         'xAE.izKlSAj9g{g[**h+q?M/PP|^i1t*ad>hG1VX2]2PBmL*Z]Ws9Ig*T7m2&BKH' );
define( 'SECURE_AUTH_KEY',  '1~ yCdID:X<BSJg.^p?ak*_H;0lb38GmBH!Tmp@6z.2*P=k3hm*O0PGmWUWOk|Jw' );
define( 'LOGGED_IN_KEY',    'dUsB1uo<d0CIm>6ceC0N$mHBe8=TUnu})bc`GzOZ$s0DJfe]h4mM_p/fmi1Bg$t[' );
define( 'NONCE_KEY',        '+)P1nm=+`#4D8oWM8lN!<Ci#6sNugAWW6Vf4F!*Pd<,~0^kNrt+lSUU81D^o{/~.' );
define( 'AUTH_SALT',        '$-u%sUMZ4Io6uw}4XMcN=zwk53Hm-Tvz9=kBMnm)]2>)3w]!L(<*]G[P_lk0c5/:' );
define( 'SECURE_AUTH_SALT', 'D`TEr#7@Y:r[7Bu`3)Yt,3(PJ!1 3{-s&}JjF&7KabN^?XqE-3IPF:MbQLVDlA-m' );
define( 'LOGGED_IN_SALT',   '2RYsevEF&/|^D$&,s``uA0W!@s=M:o@%:kbD|t(X@,-iGAMNJ`PMyatM2?=M*L6O' );
define( 'NONCE_SALT',       'O[Z5M,LosBr2)ZrQ]:!|)h8:D]w|()C9)/$bFCC8LyQYp0M8_-j&KFY.&T0-4wrD' );

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
