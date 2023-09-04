<?php

/**
 * Plugin Name: Extrums Test Plugin
 * Description: Test task for Extrums.
 * Version: 1.0
 * Author: Airmax
 * Author URI: https://airmax.pro
 * Text Domain: etp
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

declare(strict_types=1);

use ExtrumsTestPlugin\Requirements;
use ExtrumsTestPlugin\Startup;

define("ETP_PLUGIN", 'extrums-test-plugin/extrums-test-plugin.php');
define("ETP_URL", plugin_dir_url(__FILE__));

if (is_readable(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

new Requirements();
new Startup();