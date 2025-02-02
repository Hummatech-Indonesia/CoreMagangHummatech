
<?php
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_execution_time', '240');

// define('WP_CACHE', true); //Added by WP-Cache Manager
// define( 'WPCACHEHOME', '/var/www/repogit/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
// define( 'WP_MEMORY_LIMIT', '384M' );

switch(APPLICATION_ENV) {
    case 'production':
        define( 'WP_HOME', 'https://www.almanovia.com' );
        define( 'WP_SITEURL', 'https://www.almanovia.com' );
        define('DB_NAME', 'WPALMANOVIA');
        define('DB_USER', 'admin');
        define('DB_PASSWORD', 'Yr22l))tmNd:PJd9Q+y');
        define('DB_HOST', 'wsmarfilbarcelona.crqscsuhksqq.eu-west-1.rds.amazonaws.com');

        Break;

    case 'pre-production':

        define( 'WP_HOME', 'https://pre.almanovia.com' );
        define( 'WP_SITEURL', 'https://pre.almanovia.com' );
        define('DB_NAME', 'wp_almanovia');
        define('DB_USER', 'rosaclara');
        define('DB_PASSWORD', 'VDKjEMy5jak{Fd~Q');
        define('DB_HOST', 'rds-pre-gestor.czg2efwtfxw1.eu-west-1.rds.amazonaws.com');

        Break;
    case 'local-a':

        define( 'WP_HOME', 'https://loc.almanovia.com' );
        define( 'WP_SITEURL', 'https://loc.almanovia.com' );
        define('DB_NAME', 'loc.alma');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'root');
        define('DB_HOST', 'localhost');

        Break;


    case 'ddev':

        define( 'WP_HOME', 'https://almanovia.ddev.site' );
        define( 'WP_SITEURL', 'https://almanovia.ddev.site' );
        define('DB_NAME', 'db');
        define('DB_USER', 'db');
        define('DB_PASSWORD', 'db');
        define('DB_HOST', 'db');

        Break;
}

define( 'DBI_AWS_ACCESS_KEY_ID', 'AKIAY3QNBHRJIHUDNR6A' );
define( 'DBI_AWS_SECRET_ACCESS_KEY', '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' );

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');
/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');
/** Activa/desactiva Cron */
define('DISABLE_WP_CRON', TRUE);
define('DISALLOW_FILE_EDIT', TRUE); // Sucuri Security: Thu, 23 Jul 2015 11:08:55 +0000
/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '__Arista_14_20__AlmaN_11'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', '___Arista_14_20__AlmaN_11_0'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', '____Arista_14_20__AlmaN_11_1_'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '_____Arista_14_20__AlmaN_11_2_'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '______Arista_14_20__AlmaN_11_3__'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '_______Arista_14_20__AlmaN_11__'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '________Arista_14_20__AlmaN_11__5___'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '________Arista_14_20__AlmaN_11____6__'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';
/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
if(strpos($_SERVER['REQUEST_URI'], '/en/') === 0)
    define ('WPLANG', 'en_US');
else
    define ('WPLANG', 'es_ES');
/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestr****a de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);
// define( 'WP_ALLOW_REPAIR', true );
/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_POST_REVISIONS', 3);
define('FS_METHOD', 'direct');

# Cambio de url.
#define('WP_HOME','http://almanovia.com');
#define('WP_SITEURL','http://almanovia.com');
