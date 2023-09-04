<?php

declare(strict_types=1);

namespace ExtrumsTestPlugin;

class Requirements
{
    private array $pluginDeps = [
        'wordpress-seo/wp-seo.php'
    ];

    public function __construct()
    {
        add_action('plugins_loaded', [$this, 'ETPInit']);
    }

    public function ETPInit(): void
    {
        add_action('admin_notices', [$this, 'ETPFailedPluginDeps']);
    }

    public function ETPFailedPluginDeps(): void
    {
        $installed_plugins = get_plugins();
        $message = '';

        foreach ($this->pluginDeps as $plugin) {
            if (! isset($installed_plugins[$plugin])) {
                $message .= '<p>Extrums Test Plugin: You need to install ' . $plugin . ' firstly!</p>';
                continue;
            }
            if (! is_plugin_active($plugin)) {
                $message .= '<p>Extrums Test Plugin: You need to activate ' . $plugin . ' firstly!</p>';
            }
        }

        if ($message) {
            deactivate_plugins(ETP_PLUGIN);
            echo '<div class="error">' . $message . '</div>';
        }
    }
}