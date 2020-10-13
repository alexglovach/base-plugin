<?php

namespace BasePlugin\Controllers\Admin;

use BasePlugin\Controllers\RenderController;
use BasePlugin\Services\Admin\AdminService;

class AdminPageController
{

    private $BasePlugin;
    private $version;

    public function __construct(string $BasePlugin, string $version)
    {
        $this->BasePlugin = $BasePlugin;
        $this->version = $version;
    }

    public function BasePluginOptions(): void
    {
        add_options_page(' base plugin', ' base plugin', 'manage_options', 'base-plugin', array($this, 'BasePluginPage'));
    }

    public function BasePluginPage(): void
    {
        RenderController::render('Admin/BaseAdminView.php',AdminService::BasePluginPageData());
    }
}
