<?php

namespace BasePlugin\Controllers;


use BasePlugin\Controllers\Admin\AdminPageController;
use BasePlugin\Controllers\Admin\AdminScriptsController;
use BasePlugin\Controllers\Frontend\FrontendScriptsController;


class HooksController
{

    protected $loader;
    protected $BasePlugin;
    protected $version;

    public function __construct()
    {
        if (defined('BASE_PLUGIN_VERSION')) {
            $this->version = BASE_PLUGIN_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->BasePlugin = 'base-plugin';

        $this->loadDependencies();
        $this->defineAdminHooks();
        $this->definePublicHooks();
    }

    public function getBasePlugin(): string
    {
        return $this->BasePlugin;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    private function loadDependencies(): void
    {
        $this->loader = new LoaderController();
    }

    private function defineAdminHooks(): void
    {

        $adminScriptsController = new AdminScriptsController($this->getBasePlugin(), $this->getVersion());

        $this->loader->add_action('admin_enqueue_scripts', $adminScriptsController, 'enqueueStyles');
        $this->loader->add_action('admin_enqueue_scripts', $adminScriptsController, 'enqueueScripts');

        $adminPageController = new AdminPageController($this->getBasePlugin(), $this->getVersion());
        $this->loader->add_action('admin_menu', $adminPageController, 'BasePluginOptions');

    }

    private function definePublicHooks(): void
    {

        $pluginPublic = new FrontendScriptsController($this->getBasePlugin(), $this->getVersion());
        // this files temporary not used
        $this->loader->add_action('wp_enqueue_scripts', $pluginPublic, 'enqueueScripts');
        $this->loader->add_action('wp_enqueue_scripts', $pluginPublic, 'enqueueStyles');
    }

    public function run(): void
    {
        $this->loader->run();
    }

    public function getLoader(): LoaderController
    {
        return $this->loader;
    }
}
