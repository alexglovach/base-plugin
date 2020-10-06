<?php

namespace BasePlugin\Controllers\Admin;

use BasePlugin\Controllers\RunnerController;
use BasePlugin\Services\Admin\AdminService;

class AdminController
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
        wp_enqueue_style($this->BasePlugin, _BASE_PLUGIN_URL . 'admin/css/base-plugin-admin.css', array(), $this->version, 'all');
    }

    public function enqueueScripts(): void
    {
        wp_enqueue_script($this->BasePlugin, _BASE_PLUGIN_URL . 'admin/js/base-plugin-admin.js', array('jquery'), $this->version, false);
    }

    public function BasePluginOptions(): void
    {
        add_options_page(' base plugin', ' base plugin', 'manage_options', 'base-plugin', array($this, 'BasePluginPage'));
    }

    public function BasePluginPage(): void
    {
        RunnerController::render('Views/Admin/BaseAdminView.php',AdminService::BasePluginPageData());
    }
}
