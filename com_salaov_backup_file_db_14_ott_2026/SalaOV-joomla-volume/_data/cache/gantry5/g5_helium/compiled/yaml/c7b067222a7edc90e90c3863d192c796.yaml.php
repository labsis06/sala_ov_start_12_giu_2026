<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/g5_helium/blueprints/styles/base.yaml',
    'modified' => 1781705314,
    'data' => [
        'name' => 'Base Styles',
        'description' => 'Base styles for the Helium theme',
        'type' => 'core',
        'form' => [
            'fields' => [
                'background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Base Background',
                    'default' => '#ffffff'
                ],
                'text-color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Base Text Color',
                    'default' => '#424753'
                ]
            ]
        ]
    ]
];
