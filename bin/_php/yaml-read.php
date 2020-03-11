<?php
/**
 * http://symfony.com/doc/current/components/yaml/introduction.html
 */

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// Only run in Command Line Mode
//   Args:
//   [0] yaml.php (script filename)
//   [1] --
//   [2] /path/to/project/root/ (first argument)

if (PHP_SAPI === 'cli' && $argc === 3 && !empty($argv[2])) {
    $config_path = $argv[2] ;

    if (! file_exists($config_path)) {
        echo 'echo "Konnte '. $config_path .' nicht finden"';
    }

    $yaml = Yaml::parse(file_get_contents($config_path));
    $vars = '';

    foreach($yaml as $key => $val) {
        $vars .= $key . "='" . $val . "'; ";
    }

    echo $vars;
}
else {
    echo 'echo "Wrong arguments given to php"';
}
