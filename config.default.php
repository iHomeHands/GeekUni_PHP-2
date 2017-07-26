<?php
$config['db_user'] = isset($_ENV['IM_DB_USER'])?$_ENV['IM_DB_USER']:'root';
$config['db_password'] = isset($_ENV['IM_DB_PASS'])?$_ENV['IM_DB_PASS']:'';
$config['db_base'] = isset($_ENV['IM_DB_BASE'])?$_ENV['IM_DB_BASE']:'shop';
$config['db_host'] = isset($_ENV['IM_DB_HOST'])?$_ENV['IM_DB_HOST']:'localhost';
$config['db_charset'] = 'UTF-8';
$config['server_url'] = isset($_ENV['IM_SERVER_URL'])?$_ENV['IM_SERVER_URL']:'localhost';

$config['path_root'] = __DIR__;
$config['path_public'] = $config['path_root'] . '/public';
$config['path_model'] = $config['path_root'] . '/model';
$config['path_controller'] = $config['path_root'] . '/controller';
$config['path_cache'] = $config['path_root'] . '/cache';
$config['path_data'] = $config['path_root'] . '/data';
$config['path_fixtures'] = $config['path_data'] . '/fixtures';
$config['path_migrations'] = $config['path_data'] . '/migrate';
$config['path_commands'] = $config['path_root'] . '/lib/commands';
$config['path_libs'] = $config['path_root'] . '/lib';
$config['path_templates'] = $config['path_root'] . '/templates';

$config['path_logs'] = $config['path_root'] . '/logs';