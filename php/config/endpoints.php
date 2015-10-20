
<?php

use Cake\Core\Configure;

return [

    'Endpoint' => [
        'Core' => [
            'Api' => [
                'url' => Configure::read('Modules.Core.Api.protocol').'://'.Configure::read('Modules.Core.Api.hostname').'.'.Configure::read('Modules.Core.Api.domain').':'.Configure::read('Modules.Core.Api.port').'/'.( ( Configure::read('Modules.Core.Api.baseApp') ) ? Configure::read('Modules.Core.Api.baseApp').'/' : '' )
            ]
        ],

        'Finance' => [
            'Api' => [
                'url' => Configure::read('Modules.Finance.Api.protocol').'://'.Configure::read('Modules.Finance.Api.hostname').'.'.Configure::read('Modules.Finance.Api.domain').':'.Configure::read('Modules.Finance.Api.port').'/'.( ( Configure::read('Modules.Finance.Api.baseApp') ) ? Configure::read('Modules.Finance.Api.baseApp').'/' : '' )
            ],

            'App' => [
                'url' => Configure::read('Modules.Finance.App.protocol').'://'.Configure::read('Modules.Finance.App.hostname').'.'.Configure::read('Modules.Finance.App.domain').':'.Configure::read('Modules.Finance.App.port').'/'.( ( Configure::read('Modules.Finance.App.baseApp') ) ? Configure::read('Modules.Finance.App.baseApp').'/' : '' )
            ]
        ],

        'Frontend' => [
            'Api' => [
                'url' => Configure::read('Modules.Frontend.Api.protocol').'://'.Configure::read('Modules.Frontend.Api.hostname').'.'.Configure::read('Modules.Frontend.Api.domain').':'.Configure::read('Modules.Frontend.Api.port').'/'.( ( Configure::read('Modules.Frontend.Api.baseApp') ) ? Configure::read('Modules.Frontend.Api.baseApp').'/' : '' )
            ],
            'App' => [
                'url' => Configure::read('Modules.Frontend.App.protocol').'://'.Configure::read('Modules.Frontend.App.hostname').'.'.Configure::read('Modules.Frontend.App.domain').':'.Configure::read('Modules.Frontend.App.port').'/'.( ( Configure::read('Modules.Frontend.App.baseApp') ) ? Configure::read('Modules.Frontend.App.baseApp').'/' : '' )
            ]
        ],

        'Backend' => [
            'Api' => [
                'url' => Configure::read('Modules.Backend.Api.protocol').'://'.Configure::read('Modules.Backend.Api.hostname').'.'.Configure::read('Modules.Backend.Api.domain').':'.Configure::read('Modules.Backend.Api.port').'/'.( ( Configure::read('Modules.Backend.Api.baseApp') ) ? Configure::read('Modules.Backend.Api.baseApp').'/' : '' )
            ],

            'App' => [
                'url' => Configure::read('Modules.Backend.App.protocol').'://'.Configure::read('Modules.Backend.App.hostname').'.'.Configure::read('Modules.Backend.App.domain').':'.Configure::read('Modules.Backend.App.port').'/'.( ( Configure::read('Modules.Backend.App.baseApp') ) ? Configure::read('Modules.Backend.App.baseApp').'/' : '' )
            ]
        ],
    	'Auth' => [
    		'Api' => [
  				'url' => Configure::read('Modules.Auth.Api.protocol').'://'.Configure::read('Modules.Auth.Api.hostname').'.'.Configure::read('Modules.Auth.Api.domain').':'.Configure::read('Modules.Auth.Api.port').'/'.( ( Configure::read('Modules.Auth.Api.baseApp') ) ? Configure::read('Modules.Auth.Api.baseApp').'/' : '' )
   			],
   		
   			'App' => [
   				'url' => Configure::read('Modules.Auth.App.protocol').'://'.Configure::read('Modules.Auth.App.hostname').'.'.Configure::read('Modules.Auth.App.domain').':'.Configure::read('Modules.Auth.App.port').'/'.( ( Configure::read('Modules.Auth.App.baseApp') ) ? Configure::read('Modules.Auth.App.baseApp').'/' : '' )
   			]
    	]
    ]
];