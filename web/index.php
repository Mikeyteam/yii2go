<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../func.php');

$config = require(__DIR__ . '/../config/web.php');

$service = new \yii\di\ServiceLocator();
$service->set('cache','yii\caching\FileCache');

$application = new yii\web\Application($config);
$application->set('locator',$service);
$application->run();
