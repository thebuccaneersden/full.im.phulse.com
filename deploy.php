<?php
date_default_timezone_set('UTC');
require 'recipe/common.php';
require 'recipe/composer.php';
require 'config/deploy.php';

$config = new Deploy_Config();

server( 'droplet1', 'full.im.phulse.com', 22 )
    ->user( $config->user )
    ->env( 'deploy_path', $config->deploy_path )
    ->identityFile( $config->id_rsa_pub, $config->id_rsa );

set('repository', 'git@github.com:thebuccaneersden/full.im.phulse.com.git');
