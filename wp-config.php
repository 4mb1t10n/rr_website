<?php
define('DB_NAME', getenv('MYSQL_DATABASE'));
define('DB_USER', getenv('MYSQLUSER'));
define('DB_PASSWORD', getenv('MYSQLPASSWORD'));
define('DB_HOST', getenv('MYSQLHOST'));
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',         'gjQ2%%[*C-T.BU>F:-VPmT+6Jx:~w05oY(yf)- 93pn+]}2#X[:*Ao1>~<3NJz<v');
define('SECURE_AUTH_KEY',  'lfJX(woAocmRf7mN@`B;F$U<rj{vbx/f)G~A{F[nZAM[g?cx@Iu1vd~QFmO3-:9i');
define('LOGGED_IN_KEY',    'dE|JP72 spto:PK=}SB$Zss{ayC)~4VlTJ|oV(]~~$i77|vnJJo,|A?J NthB,@`');
define('NONCE_KEY',        'O|1tGp<=y.:C(r1=Q5Wf07h6ahi:yDS4t&-H#8;a*vJ`6Q9BeKECB7<8z9~gLz7T');
define('AUTH_SALT',        'KD&33R6^ySTN{4^s^Dw|+Rc(iI.-$;~ZGVOj?M2=t]u:t_xb15ws;kjRLHH7pvHZ');
define('SECURE_AUTH_SALT', 'gi=?_|K*|.%OW|7n|[>Cv{E(|M|rULb.j^]68$RZ*V+z^9lD1<3M mTjU&c8-=~w');
define('LOGGED_IN_SALT',   ',MzTHe&C(^Gl%MN4R=);_H;OBloL`),r8[DY#;-S8V}v^+X) QfZD]Hfz[ZMj2wP');
define('NONCE_SALT',       'e!~:[|J+`42srHBWO<)c%S8~*P]bS>xBd1Z?G#%)0u,M-=qav?.t/|nFJB&^AB3>');

$table_prefix = 'wp_';

define('WP_DEBUG', false);
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}
require_once ABSPATH . 'wp-settings.php';