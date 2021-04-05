<?php
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */
   
    defined('APP_NAME')         OR define('APP_NAME', 'NasAcademy');

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    defined('APP_ENV')          OR define('APP_ENV', 'local');
    
    // local, development, staging, production, and live

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */
    
    defined('APP_DEBUG')        OR define('APP_DEBUG', true); // true or false

    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);
    
    error_reporting(E_ALL);
    
    error_reporting(E_WARNING);
    
    error_reporting(E_NOTICE);
    
    error_reporting(E_ALL & ~E_NOTICE);
    
    error_reporting(-1);


    // defined('APP_DEBUG')        OR define('APP_DEBUG', false); // true or false

    // ini_set('display_errors', 0);
    
    // error_reporting(0);

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Farmsby command line tool. You should set this to the root of
    | your application so that it is used when running Farmsby tasks.
    |
    */

    defined('APP_URL')          OR define('APP_URL', 'http://127.0.0.1/nas/');

    /*
    |--------------------------------------------------------------------------
    | Application Storage
    |--------------------------------------------------------------------------
    |
    | This URL is used by the software to properly store files from uploads
    | configure the path to accept uploads of photos, files and etc...
    |
    */

    defined('APP_HELPER')       OR define('APP_HELPER', APP_URL.'app/helpers/');
    
    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    defined('TIMEZONE')         OR define('TIMEZONE', 'UTC');

    defined('GLOBAL_DATE')      OR define('GLOBAL_DATE', date(DATE_RFC2822));
    
    defined('DEVICE_DATE')      OR define('DEVICE_DATE', date("Y-m-d"));

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    defined('LOCALE')           OR define('LOCALE', 'en');

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    defined('KEY')              OR define('KEY', 'VNATfbChXqGFeHUYJXbVavVwaKZqRj');
    
    defined('CIPHER')           OR define('CIPHER', 'AES-256-CBC');

    defined('RAND_TIMESTAMP')   OR define('RAND_TIMESTAMP', round(microtime(true)));
    /*
    |--------------------------------------------------------------------------
    | System Configurations and Settings
    |--------------------------------------------------------------------------
    |
    | This sections contains short quick, and magic constant defined by PHP
    | to get system value
    |
    */
    defined('SERVER_PORT')      OR define('SERVER_PORT', $_SERVER['SERVER_PORT']);
    
    defined('SERVER_PROTOCOL')  OR define('SERVER_PROTOCOL', $_SERVER['SERVER_PROTOCOL']);
    
    defined('DOCUMENT_ROOT')    OR define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
    
    defined('REQUEST_METHOD')   OR define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);    
    
    defined('APPPATH')          OR define('APP_PATH', dirname( __FILE__ ));
 
    defined('DEVICE_IP')        OR define('DEVICE_IP', $_SERVER['REMOTE_ADDR']);
 
    defined('USER_AGENT')       OR define('USER_AGENT', getenv("HTTP_USER_AGENT"));

    defined('HTTP_REFERER')     OR @define('HTTP_REFERER', $_SERVER['HTTP_REFERER']);