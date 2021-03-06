<?php
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/autoload.php';
$app = new App;
$app->init();

if ($argc == 1) {
    $dir = opendir(Config::get('path_commands'));
    echo 'Available commands: ' . "\n";
    while ($rd = readdir($dir)) {
        if ($rd !== '.'
            && $rd !== '..'
            && $rd !== 'ICommand.class.php'
            && $rd !== 'Command.class.php') {
            $commandName = str_replace('.class.php', '', $rd);
            $commandDescription = $commandName::$description;
            echo $commandName . ': ' . $commandDescription . "\n";
        }
    }
} else {
    $args = [];
    for ($i = 2; $i < $argc; $i++) {
        $args[] = $argv[$i];
    }
    $command = new $argv[1];
    $command->run($args);
}
