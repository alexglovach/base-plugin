<?php

namespace BasePlugin\Controllers;


use BasePlugin\Controllers\Admin\AdminController;
use BasePlugin\Controllers\Frontend\FrontendController;


class RunnerController
{

    protected $loader;
    protected $BasePlugin;
    protected $version;

    public function __construct()
    {
        if (defined('_BASE_PLUGIN_VERSION')) {
            $this->version = _BASE_PLUGIN_VERSION;
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

        $adminController = new AdminController($this->getBasePlugin(), $this->getVersion());

        $this->loader->add_action('admin_enqueue_scripts', $adminController, 'enqueueStyles');
        $this->loader->add_action('admin_enqueue_scripts', $adminController, 'enqueueScripts');
        $this->loader->add_action('admin_menu', $adminController, 'BasePluginOptions');

    }

    private function definePublicHooks(): void
    {

        $pluginPublic = new FrontendController($this->getBasePlugin(), $this->getVersion());
        // this files temporary not used
        $this->loader->add_action('wp_enqueue_scripts', $pluginPublic, 'enqueueScripts');
        $this->loader->add_action('wp_enqueue_scripts', $pluginPublic, 'enqueueStyles');
    }

    public static function render(string $templateName, array $data)
    {
        $templateName = _BASE_PLUGIN_PATH . $templateName;
        extract($data);
        include $templateName;
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
