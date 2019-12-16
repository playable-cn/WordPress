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
 * * PGSQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

define( 'DB_DRIVER', 'pgsql' );

/**
 * Set this to 'true' and check that `pg4wp` is writable if you want debug logs to be written
 */
define( 'PG4WP_DEBUG', false );

/**
 * If you just want to log queries that generate errors, leave PG4WP_DEBUG to "false"
 * and set this to true
 */
define( 'PG4WP_LOG_ERRORS', true );

define('PG4WP_SEQ_COMMENTMETA', 'wp_commentmeta_meta_id_seq');
define('PG4WP_SEQ_COMMENTS', 'wp_comments_comment_id_seq');
define('PG4WP_SEQ_LINKS', 'wp_links_link_id_seq');
define('PG4WP_SEQ_OPTIONS', 'wp_options_option_id_seq');
define('PG4WP_SEQ_POSTMETA', 'wp_postmeta_meta_id_seq');
define('PG4WP_SEQ_POSTS', 'wp_posts_id_seq');
define('PG4WP_SEQ_TAXONOMY', 'wp_term_taxonomy_term_taxonomy_id_seq');
define('PG4WP_SEQ_TERMS', 'wp_terms_term_id_seq');
define('PG4WP_SEQ_TERMTERM', 'wp_termmeta_meta_id_seq');
define('PG4WP_SEQ_USERMETA', 'wp_usermeta_umeta_id_seq');
define('PG4WP_SEQ_USERS', 'wp_users_id_seq');

// ** PGSQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '' );

/** PGSQL database username */
define( 'DB_USER', 'postgres' );

/** PGSQL database password */
define( 'DB_PASSWORD', 'postgres' );

/** PGSQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** PGSQL port */
define( 'DB_PORT', 5432 );

/** PGSQL Schema */
define( 'DB_SCHEMA', 'public' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

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
define( 'WP_DEBUG', true );

define( 'AUTOMATIC_UPDATER_DISABLED', true );

define( 'WPLANG', 'ja' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
