<?php return array(
    'root' => array(
        'name' => 'airmax-pro/extrums-test-plugin',
        'pretty_version' => '0.0.1',
        'version' => '0.0.1.0',
        'reference' => NULL,
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'airmax-pro/extrums-test-plugin' => array(
            'pretty_version' => '0.0.1',
            'version' => '0.0.1.0',
            'reference' => NULL,
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'squizlabs/php_codesniffer' => array(
            'pretty_version' => '3.7.2',
            'version' => '3.7.2.0',
            'reference' => 'ed8e00df0a83aa96acf703f8c2979ff33341f879',
            'type' => 'library',
            'install_path' => __DIR__ . '/../squizlabs/php_codesniffer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
    ),
);
