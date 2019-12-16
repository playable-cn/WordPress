<?php

define('PG4WP_ROOT', ABSPATH . WPINC . '/wp-db-driver');

if (!defined('PG4WP_DEBUG')) {
    define('PG4WP_DEBUG', false);
}

if (!defined('PG4WP_LOG_ERRORS')) {
    define('PG4WP_LOG_ERRORS', false);
}

if (!defined('PG4WP_LOG')) {
    define('PG4WP_LOG', PG4WP_ROOT . '/logs/');
}

// Check if the logs directory is needed and exists or create it if possible
if( (PG4WP_DEBUG || PG4WP_LOG_ERRORS) &&
    !file_exists( PG4WP_LOG) &&
    is_writable(dirname( PG4WP_LOG)))
    mkdir( PG4WP_LOG);

// Load the driver defined in 'db.php'
$driver = defined( 'DB_DRIVER' ) ? DB_DRIVER : '';
if ( !empty($driver) ) {
    $driver_wp_db = PG4WP_ROOT . '/' . $driver . '/db.php';
    if ( !file_exists( $driver_wp_db ) ) {
        wp_die(
            sprintf('<strong>ERROR</strong>: db driver "%s" not exists.',
                "<code>$driver</code>"
            )
        );
    }
    require_once( $driver_wp_db );
} else {
    require_once( ABSPATH . WPINC . '/wp-db.php' );
}
