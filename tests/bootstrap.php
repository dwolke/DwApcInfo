<?php
/**
 * DwApcInfo Module (https://github.com/dwolke/DwApcInfo)
 *
 * @link https://github.com/dwolke/DwApcInfo for the canonical source repository
 * @author  Daniel Wolkenhauer <wiwoweb@gmail.com>
 */

chdir(__DIR__);

$loader = null;
if (file_exists('../vendor/autoload.php')) {
    $loader = include '../vendor/autoload.php';
} elseif (file_exists('../../../autoload.php')) {
    $loader = include '../../../autoload.php';
} else {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

$loader->add('DwApcInfoTest', __DIR__);

if (!$config = @include 'configuration.php') {
    $config = require 'configuration.php.dist';
}
