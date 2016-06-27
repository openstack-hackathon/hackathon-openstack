<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hackathon_openstackgdl_o');

/** MySQL database username */
define('DB_USER', 'hackathonopensta');

/** MySQL database password */
define('DB_PASSWORD', 'Uc8DM^D5');

/** MySQL hostname */
define('DB_HOST', 'mysql.hackathon.openstackgdl.org');

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
define('AUTH_KEY',         '/|6JnUj3eLg`6DXk9wzyDD!%CJe8N/OLV52s2^L+egOkBJ!xcx#*ILPS3`AuhStD');
define('SECURE_AUTH_KEY',  'Y;ufcyVYGRF9LiOLrmWa!:iT)%PyL4hMiqR;7g1yk6XdA+NL199A|uNTmO`c`NNf');
define('LOGGED_IN_KEY',    'SR5M@Z/YBWPYWA^EtJ0j#uux9nfycaHTK+oX*RU4VXYzy?YOus)a!38Sl+W8`5:7');
define('NONCE_KEY',        'lIjLEpcrma_$qdM(+3yYHeQiexI3A0H~Dx0m2&_hla^r?X`JRCZtQ6$5ib+~YTHl');
define('AUTH_SALT',        'hesZ!dKLibOu:WjCCx16eOPx(e0j3DQ;pl)km+rPR)(Ve#fD|u)!(*!@(ni#jI6&');
define('SECURE_AUTH_SALT', '+yK"|%DdP^e1KDaNL1f?ekE^/MX~;Rf)ixaS*0O/5SO5D`demkf^3HyF9hdQrS:d');
define('LOGGED_IN_SALT',   'oPbAy)?mix&1:m+K@;Td"55hJXpRvJi|iA1jY(ofyqBurwV2p^W`&3tl)Iu8cCta');
define('NONCE_SALT',       'va:j!~oNeq)abt:uivX745P6so8B$RBelE(rpVGhp0@tp;9qEx2Dob!LsWa&#yG7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_z2b6au_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

