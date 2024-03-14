<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
require_once(BASEPATH . 'database/DB.php');
$db =& DB();
$config['general_settings'] = $db->get('general_settings')->row();
$config['settings'] = $db->get('settings')->row();
$db->close();

$config['google']['client_id']        = $config['general_settings']->google_client_id;
$config['google']['client_secret']    = $config['general_settings']->google_client_secret;
$config['google']['redirect_uri']     = $config['general_settings']->google_redirect_url;
$config['google']['application_name'] = 'Login to '.$config['settings']->site_url;
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();