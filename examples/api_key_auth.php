<?php
/**
 * PHP API usage example
 *
 * contributed by: Art of WiFi
 * description:    example to demonstrate API key authentication with a UniFi OS-based controller,
 *                 pulling site health metrics and outputting the results in json format
 */

/**
 * using the composer autoloader
 */
require_once 'vendor/autoload.php';

/**
 * include the config file (place your credentials etc. there if not already present)
 * see the config.template.php file for an example
 */
require_once 'config.php';

/**
 * the short name of the site you wish to query
 */
$site_id = '<enter your site id here>';

/**
 * initialize the UniFi API connection class, set the API key and pull the requested data
 *
 * note: no login() call is needed when using API key authentication
 */
$unifi_connection = new UniFi_API\Client('', '', $controllerurl, $site_id);
$unifi_connection->set_api_key($controllerapikey);

$set_debug_mode = $unifi_connection->set_debug($debug);
$result         = $unifi_connection->list_health();

/**
 * output the results in correct json formatting
 */
header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);
