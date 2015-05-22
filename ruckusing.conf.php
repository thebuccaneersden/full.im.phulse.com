<?php
date_default_timezone_set('UTC');

//----------------------------
// DATABASE CONFIGURATION
//----------------------------

/*

Valid types (adapters) are Postgres & MySQL:

'type' must be one of: 'pgsql' or 'mysql' or 'sqlite'

*/
return array(
    'db' => array(
        'development' => array(
            'type' => 'sqlite',
            'database' => 'data/dev.full.im.phulse.com.sqlite3',
            'host' => 'localhost',
            'port' => '',
            'user' => '',
            'password' => ''
        ),
        'sqlite_test' => array(
            'type' => 'sqlite',
            'database' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'data/test.full.im.phulse.com.sqlite3',
            'host' => 'localhost',
            'port' => '',
            'user' => '',
            'password' => ''
        )
    ),
    //'migrations_dir' => array('default' => 'migrations'),
    'migrations_dir' => array('default' => RUCKUSING_WORKING_BASE . '/migrations'),
    'db_dir' => RUCKUSING_WORKING_BASE . DIRECTORY_SEPARATOR . 'data',
    'log_dir' => RUCKUSING_WORKING_BASE . DIRECTORY_SEPARATOR . 'logs',
    // 'db_dir' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'data',
    // 'log_dir' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'logs',
    'ruckusing_base' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/ruckusing/ruckusing-migrations' //dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/ruckusing/ruckusing-migrations/'
);
