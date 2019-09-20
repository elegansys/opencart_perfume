<?php
// HTTP
// HTTP

define('HTTP_SERVER', 'http://'.$_SERVER['SERVER_NAME'].'/admin/');

define('HTTP_CATALOG', 'http://'.$_SERVER['SERVER_NAME'].'/');



// HTTPS

define('HTTPS_SERVER', 'https://'.$_SERVER['SERVER_NAME'].'/admin/');

define('HTTPS_CATALOG', 'https://'.$_SERVER['SERVER_NAME'].'/');


// DIR
define('DIR_APPLICATION', 'C:/xampp123/htdocs/git/perfume/admin/');
define('DIR_SYSTEM', 'C:/xampp123/htdocs/git/perfume/system/');
define('DIR_IMAGE', 'C:/xampp123/htdocs/git/perfume/image/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_CATALOG', 'C:/xampp123/htdocs/git/perfume/catalog/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'perfume');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');

// OpenCart API
define('OPENCART_SERVER', 'https://www.opencart.com/');
