<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/g5_helium/particles/horizontalmenu.yaml',
    'modified' => 1781705314,
    'data' => [
        'name' => 'Horizontal Menu',
        'description' => 'Display horizontal menu.',
        'type' => 'particle',
        'icon' => 'fa-forward',
        'configuration' => [
            'caching' => [
                'type' => 'static'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable icon menu particles.',
                    'default' => true
                ],
                'class' => [
                    'type' => 'input.selectize',
                    'label' => 'CSS Classes',
                    'description' => 'CSS class name for the particle.'
                ],
                'target' => [
                    'type' => 'select.select',
                    'label' => 'Target',
                    'description' => 'Target browser window when item is clicked.',
                    'placeholder' => 'Select...',
                    'default' => '_blank',
                    'options' => [
                        '_parent' => 'Self',
                        '_blank' => 'New Window'
                    ]
                ],
                'items' => [
                    'type' => 'collection.list',
                    'array' => true,
                    'label' => 'Menu Items',
                    'description' => 'Create each menu item to display.',
                    'value' => 'name',
                    'ajax' => true,
                    'fields' => [
                        '.name' => [
                            'type' => 'input.text',
                            'label' => 'Name',
                            'skip' => true
                        ],
                        '.text' => [
                            'type' => 'input.text',
                            'label' => 'Text'
                        ],
                        '.link' => [
                            'type' => 'input.text',
                            'label' => 'Link'
                        ]
                    ]
                ]
            ]
        ]
    ]
];
