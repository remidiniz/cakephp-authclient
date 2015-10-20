<?php
use Cake\Core\Configure;

return [
    'Session' => [
        'defaults' => 'database',
    	'handler' => [
        	'engine' => 'Database',
        	'model' => 'Sessions'
    	],
    	'ini' => [
    		'session.cookie_name' => Configure::read('Cookies.Main.name'),
    		'session.cookie_lifetime' => 20160, // 2 weeks
    		'session.cookie_httponly' => Configure::read('Cookies.Main.httpOnly')
    	]
    ]
];