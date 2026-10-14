<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/g5_helium/blueprints/styles/navigation.yaml',
    'modified' => 1781705314,
    'data' => [
        'name' => 'Navigation Styles',
        'description' => 'Navigation section styles for the Helium theme',
        'type' => 'section',
        'form' => [
            'fields' => [
                'background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Background',
                    'default' => '#312f38'
                ],
                'text-color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Text',
                    'default' => '#ffffff'
                ]
            ]
        ]
    ]
];
