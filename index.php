<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 14:42
 */

define("ROOT_DIR", __DIR__);
define("LIB_DIR", __DIR__."/lib/amulet/src/AmuletOfDragon");

require ROOT_DIR."/vendor/autoload.php";

$config = new \AmuletOfDragon\Config(ROOT_DIR."/res/config.yml");

\AmuletOfDragon\Amulet::getInstance()->setConfig($config);
\AmuletOfDragon\Amulet::getInstance()->start();
\AmuletOfDragon\Router::create();
