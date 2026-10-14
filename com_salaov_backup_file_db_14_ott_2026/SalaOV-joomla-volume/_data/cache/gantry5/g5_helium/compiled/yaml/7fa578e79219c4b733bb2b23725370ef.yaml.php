<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/g5_helium/blueprints/styles/link.yaml',
    'modified' => 1781705314,
    'data' => [
        'name' => 'Link Colors',
        'description' => 'Link colors for the Helium theme',
        'type' => 'core',
        'form' => [
            'fields' => [
                'regular' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Link Color',
                    'default' => '#4db2b3'
                ],
                'hover' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Hover Color',
                    'default' => '#424753'
                ]
            ]
        ]
    ]
];
