<?php

namespace BasePlugin\Controllers\Admin;

class AdminScriptsController
{

    private $BasePlugin;
    private $version;

    public function __construct(string $BasePlugin, string $version)
    {
        $this->BasePlugin = $BasePlugin;
        $this->version = $version;
    }

    public function enqueueStyles(): void
    {
        wp_enqueue_style($this->BasePlugin, BASE_PLUGIN_URL . 'admin/css/base-plugin-admin.css', array(), $this->version, 'all');
    }

    public function enqueueScripts(): void
    {
        wp_enqueue_script($this->BasePlugin, BASE_PLUGIN_URL . 'admin/js/base-plugin-admin.js', array('jquery'), $this->version, false);
    }
}
