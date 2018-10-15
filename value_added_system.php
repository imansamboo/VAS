<?php
/**
 * Value Added System Module developed by Muhammadreza Jafari - imansamboo@gmail.com
 * this addon module develop for OnlineServer company.
 */

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}


/**
 * Define addon module configuration parameters.
 * @return array
 */
function value_added_system_config()
{
    return array(
        'name' => 'value_added_system', // Display name for your module
        'description' => 'This module provides Value addded and tax calculation', // Description displayed within the admin interface
        'author' => 'imansamboo@gmail.com', // Module author name
        'language' => 'english', // Default language
        'version' => '1.0', // Version number
    );
}

/**
 * Activate.
 *
 * Called upon activation of the module for the first time.
 * Use this function to perform any database and schema modifications
 * required by your module.
 *
 * This function is optional.
 *
 * @return array Optional success/failure message
 */
function value_added_system_activate()
{
    // Create custom tables and schema required by your module
    //create VA table
    $query = "CREATE TABLE `whmcs`.`VA-main` ( `id` INT NOT NULL AUTO_INCREMENT ,`user_id` INT NOT NULL ,  `product_type` VARCHAR(255) NOT NULL , `product_id` INT NOT NULL , `company_id` INT NOT NULL , `factor_id` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    full_query($query);

    //create company specification table
    $query = "CREATE TABLE `whmcs`.`VA-company-specification` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `address` TEXT NOT NULL , `economical_number` INT NOT NULL , `registration_number` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    full_query($query);

    //create factor  table
    $query = "CREATE TABLE `whmcs`.`VA-factor` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL ,  `company_id` INT NOT NULL , `name` VARCHAR(255) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB; ";
    full_query($query);


    return array(
        'status' => 'success', // Supported values here include: success, error or info
        'description' => 'Value added system waked up',
    );
}

/**
 * Deactivate.
 *
 * Called upon deactivation of the module.
 * Use this function to undo any database and schema modifications
 * performed by your module.
 *
 * This function is optional.
 *
 * @return array Optional success/failure message
 */
function value_added_system_deactivate()
{
    // Undo any database and schema modifications made by your module here
    $query = "DROP TABLE `VA-main`";
    full_query($query);

    $query = "DROP TABLE `VA-company-specification`";
    full_query($query);

    $query = "DROP TABLE `VA-factor`";
    full_query($query);

    return array(
        'status' => 'success', // Supported values here include: success, error or info
        'description' => 'Value added system slept.',
    );
}

/**
 * Upgrade.
 *
 * Called the first time the module is accessed following an update.
 * Use this function to perform any required database and schema modifications.
 *
 * This function is optional.
 *
 * @return void
 */
function value_added_system_upgrade($vars)
{
    
}

/**
 * Admin Area Output.
 *
 * Called when the addon module is accessed via the admin area.
 * Should return HTML output for display to the admin user.
 *
 * This function is optional.
 *
 * @see AddonModule\Admin\Controller@index
 *
 * @return string
 */
function value_added_system_output($vars)
{
    echo '<pre>';
    print_r($vars);
    echo '</pre>';
    
}

/**
 * Admin Area Sidebar Output.
 *
 * Used to render output in the admin area sidebar.
 * This function is optional.
 *
 * @param array $vars
 *
 * @return string
 */
function value_added_system_sidebar($vars)
{
   
}

/**
 * Client Area Output.
 *
 * Called when the addon module is accessed via the client area.
 * Should return an array of output parameters.
 *
 * This function is optional.
 *
 * @see AddonModule\Client\Controller@index
 *
 * @return array
 */
function value_added_system_clientarea($vars)
{
    // Get common module parameters
/*
    $modulelink = $vars['modulelink']; // eg. index.php?m=addonmodule
    $version = $vars['version']; // eg. 1.0
    $_lang = $vars['_lang']; // an array of the currently loaded language variables

    // Get module configuration parameters
    $configTextField = $vars['Text Field Name'];
    $configPasswordField = $vars['Password Field Name'];
    $configCheckboxField = $vars['Checkbox Field Name'];
    $configDropdownField = $vars['Dropdown Field Name'];
    $configRadioField = $vars['Radio Field Name'];
    $configTextareaField = $vars['Textarea Field Name'];

    // Dispatch and handle request here. What follows is a demonstration of one
    // possible way of handling this using a very basic dispatcher implementation.

    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
*/
}
