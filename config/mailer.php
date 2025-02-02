<?php

/************************************
 * 
 * This file contains the Default Mailer service configurations.
 * 
 * However, You are not restricted to modify this file to use your mailing configurations.
 */

return [

    /*************
     * This is the dafault Mailer Service configured as default
     */
    'preset' => 'PHP MAILER',
    

    /***********
     * This sets up the mailing driver.
     * 
     * by default, mail driver is set to 'smtp'.
     */
    'mail_driver' => 'smtp',

    
    /*****************
     * This refers to the default method for mailing. 
     * The method should be found in the MailerService Class.
     */
    'mail_service_default_method' => 'php_mailer', 
 

    /***************************
     * 
     * 
     * The configs to use while executing the Mail Method/function
     * 
     * The settings should be available in the .env file at the root 
     * path of this app.
     * 
     * For timeout, you can set it here or leave it as null.
     */
    'mailer' => array(
        'smtp' => array(
            'host' => $_ENV['MAIL_HOST'],
            'port' => $_ENV['MAIL_PORT'], 
            'encryption_criteria' => $_ENV['MAIL_ENCRYPTION_CRITERIA'],
            'encoding' => 'UTF-8',
            'timeout' => 300,
            'debug' => false
        )
    ),




    /****************************
     * 
     * The source email(sender) configurations
     * The settings should be setup in the .env file as well.
     */
    'source' => array (
        'email_address' => $_ENV['MAIL_SOURCE_ADDRESS'],
        'email_username' => $_ENV['MAIL_SOURCE_USERNAME'],
        'email_password' => $_ENV['MAIL_SOURCE_ADDRESS_PASSWORD']
    ),




    /************************
     * 
     * A markup to use for the email.
     * To use the markup, preset key must be true.
     * The markup should also be pathed on the defaulted path as well.
     */
    'markup_lang' => array(
        'preset' => true,
        'default' => array(
            'path' => 'resources/vendor/templates/mails'
        )
    ),


];





