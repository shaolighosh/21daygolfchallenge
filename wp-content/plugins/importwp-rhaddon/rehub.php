<?php

/**
 * Plugin Name: ImportWP - Rehub Addon
 * Plugin URI: https://wpsoul.com
 * Description: Allow ImportWP to import Rehub fields.
 * Author: Igor Sunz
 * Version: 1.6
 * Author URI: https://wpsoul.com
 * Network: True
 */


add_action('admin_init', 'rh_impro_addon_check');

function rh_impro_theme_requirements_met()
{
    return false === (is_admin() && current_user_can('activate_plugins') &&  (get_template() != 'rehub-theme' || (!function_exists('import_wp_pro') && !function_exists('import_wp')) ));
}

function rh_impro_addon_check()
{
    if (!rh_impro_theme_requirements_met()) {

        add_action('admin_notices', 'rh_impro_theme_notice');

        deactivate_plugins(plugin_basename(__FILE__));

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
}

function rh_impro_theme_setup()
{
    if (!rh_impro_theme_requirements_met()) {
        return;
    }
    $base_path = dirname(__FILE__);
    require_once $base_path . '/class/autoload.php';
    require_once $base_path . '/setup.php';
}
add_action('plugins_loaded', 'rh_impro_theme_setup', 9);

function rh_impro_theme_notice()
{
    echo '<div class="error">';
    echo '<p><strong>ImportWP - ImportWP - Rehub Addon</strong> requires that you have <strong>ImportWP v2.0.21 or newer</strong>, and <strong>Rehub theme</strong> installed.</p>';
    echo '</div>';
}



if(!class_exists('PucFactory')){
    require dirname(__FILE__) .'/class-update-checker.php';
}

add_action('admin_init', 'rh_update_check_rhaddon');

function rh_update_check_rhaddon(){
    //Updater
    if(defined('PLUGIN_REPO')){
        $serverupdateurl = PLUGIN_REPO;
    }else{
        $serverupdateurl = 'https://wpsoul.net/serverupdate/';
    }
    $tf = 'tfuser=';
    $rehub_options = get_option( 'Rehub_Key' );
    $tf_username = isset( $rehub_options[ 'tf_username' ] ) ? $rehub_options[ 'tf_username' ] : '';
    if($tf_username) {
        $tf = 'tfuser='.$tf_username;
    }
    
    $wpfepp_checker = PucFactory::buildUpdateChecker(
        $serverupdateurl.'?action=get_metadata&slug=importwp-rhaddon&'.$tf,
        __FILE__,
        'importwp-rhaddon',
        '24'
    );
}
