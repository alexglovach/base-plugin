<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       Base Plugin
 * Description:       Base Plugin
 * Version:           1.0.0
 * Author:
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       base-plugin
 */

namespace BasePlugin;

use BasePlugin\Controllers\ActivatorController;
use BasePlugin\Controllers\DeactivatorController;
use BasePlugin\Controllers\HooksController;

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('BASE_PLUGIN_VERSION', '1.0.0');
define('BASE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('BASE_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once __DIR__ .'/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 */
function activate_base_plugin()
{
    ActivatorController::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_base_plugin()
{
    DeactivatorController::deactivate();
}

register_activation_hook(__FILE__, 'activate_base_plugin');
register_deactivation_hook(__FILE__, 'deactivate_base_plugin');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_hooks()
{
    $plugin = new HooksController();
    $plugin->run();
}

run_plugin_hooks();

/*
//connect by update-checker documentation - change to correct!!!!!
require 'lib/plugin-update-checker/plugin-update-checker.php';
$BasePluginUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://gitlab.com/repo-link/',
    __FILE__,
    'base-plugin'
);

$BasePluginUpdateChecker->setAuthentication('auth_key');
*/