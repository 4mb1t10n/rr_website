<?php
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

define('AUTH_KEY', 'your_unique_key');
define('SECURE_AUTH_KEY', 'your_unique_key');
define('LOGGED_IN_KEY', 'your_unique_key');
define('NONCE_KEY', 'your_unique_key');
define('AUTH_SALT', 'your_unique_key');
define('SECURE_AUTH_SALT', 'your_unique_key');
define('LOGGED_IN_SALT', 'your_unique_key');
define('NONCE_SALT', 'your_unique_key');

define('UPLOADS', 'wp-content/uploads');

define('WP_DEBUG', false);
