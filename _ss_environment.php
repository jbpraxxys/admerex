<?php

define('SS_ENVIRONMENT_TYPE', 'live');
define('SS_DATABASE_CLASS', 'MySQLPDODatabase');

define('SS_DATABASE_SERVER', 'NO');
define('SS_DATABASE_NAME', 'admerex_db');

if(SS_ENVIRONMENT_TYPE === 'live') {

define('SS_DATABASE_USERNAME', '');
define('SS_DATABASE_PASSWORD', '');

} else {

define('SS_DATABASE_USERNAME', '');
define('SS_DATABASE_PASSWORD', '');

}

define('SS_DATABASE_SSL_KEY', '/home/admerex/ssl/client-key.pem');
define('SS_DATABASE_SSL_CERT', '/home/admerex/ssl/client-cert.pem');
define('SS_DATABASE_SSL_CA', '/home/admerex/ssl/ca-cert.pem');

define('SS_DEFAULT_ADMIN_USERNAME', 'admin');
define('SS_DEFAULT_ADMIN_PASSWORD', 'admin');

global $_FILE_TO_URL_MAPPING;
$_FILE_TO_URL_MAPPING['/var/www/admerex-drafts.praxxys.ph'] = 'http://admerex-drafts.praxxys.ph';
