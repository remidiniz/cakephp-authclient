
<?php

use Cake\Core\Configure;

return [

    'Modules' => [       
   		'Auth' => [
   				'Api' => [
   						'hostname' => 'auth-starad24',
   						'domain' => Configure::read('General.Api.domain'),
   						'port' => Configure::read('General.Api.port'),
   						'protocol' => Configure::read('General.Api.protocol'),
   						'baseApp' => ''
   			]
    	],
    	'Core' => [
            'Api' => [
                'hostname' => 'core-starad24',
                'domain' => Configure::read('General.Api.domain'),
                'port' => Configure::read('General.Api.port'),
                'protocol' => Configure::read('General.Api.protocol'),
                'baseApp' => ''
            ]
        ],

        'Finance' => [
            'Api' => [
                'hostname' => 'finance-starad24',
                'domain' => Configure::read('General.Api.domain'),
                'port' => Configure::read('General.Api.port'),
                'protocol' => Configure::read('General.Api.protocol'),
                'baseApp' => ''
            ],

            'App' => [
                'hostname' => 'finance-starad24',
                'domain' => Configure::read('General.App.domain'),
                'port' => Configure::read('General.App.port'),
                'protocol' => Configure::read('General.App.protocol'),
                'baseApp' => ''
            ]
        ],

        'Frontend' => [
            'Api' => [
                'hostname' => 'front-starad24',
                'domain' => Configure::read('General.Api.domain'),
                'port' => Configure::read('General.Api.port'),
                'protocol' => Configure::read('General.Api.protocol'),
                'baseApp' => ''
            ],
            'App' => [
                'hostname' => 'front-starad24',
                'domain' => Configure::read('General.App.domain'),
                'port' => Configure::read('General.App.port'),
                'protocol' => Configure::read('General.App.protocol'),
                'baseApp' => ''
            ]
        ],

        'Backend' => [
            'Api' => [
                'hostname' => 'back-starad24',
                'domain' => Configure::read('General.Api.domain'),
                'port' => Configure::read('General.Api.port'),
                'protocol' => Configure::read('General.Api.protocol'),
                'baseApp' => ''
            ],

            'App' => [
                'hostname' => 'back-starad24',
                'domain' => Configure::read('General.App.domain'),
                'port' => Configure::read('General.App.port'),
                'protocol' => Configure::read('General.App.protocol'),
                'baseApp' => ''
            ]
        ]
    ]
];