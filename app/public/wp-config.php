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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'la/YVdSbhgjpxq1p3LA4geHWPkfLMV+Skx37rlixh0QpFQeAqoHd0Bfi0VwzfIzbjGQvxdtPPhP+DQoal1D5rQ==');
define('SECURE_AUTH_KEY',  'cRqCYqMuSFoMMubJ/VJtyzKG/tw41bWKuEyyMCEEUXl1x/jX924HULRFUi6nDRGTO7DO5n7IhvMpP6+TTwQ16Q==');
define('LOGGED_IN_KEY',    'KtZzebgbmgh5HmE1K1XIMRA+ukbTrQ6rK3Ikmljr55q49VEQ2K1YruLjSUYfgsxYDTdAyXAPD0N5HO07AI/9PQ==');
define('NONCE_KEY',        'v/PpQXz5F/9N94IA6L3NB5PaWjFze8If41sZYpjLb6ig8tT7N33N0jR28CLI4MAauteXYdJPFSA7L7+sLG0zsw==');
define('AUTH_SALT',        'p5DpwMWI0pnbHvFmv4qkzgUdg3CeMnHIWGy3esoI5/iM0EQFP29ELgD6X/4qoB869Qzqh5kbwFUMNv/miDU2VA==');
define('SECURE_AUTH_SALT', 'BWPvYrxPP2hMrcIIbHcBlRTUxkoWfqcOxT07tkaehZ9anQzQQr9B2MJKLMMupnfbI17QzTXvoSgLrzIdGEiXPw==');
define('LOGGED_IN_SALT',   'uKDsTsvit2aRqOgCUcjqHQeHfG/8GHmY6ExFmIbh3JHPfj6p8VD0m9FD4i3vvznKWH7AXKcikevGI2o2Askpzw==');
define('NONCE_SALT',       'scylzcYo7jX/YRugYeAluh6G0vlXUd5lzM3/hdJ5H6m7NknL1reQHvVlS6zKdbvh4tGAGirjRknnLgeDOafsJQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
