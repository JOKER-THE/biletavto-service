<?php

/**
 * Подключение autoload и ядра фреймворка Yii2.
 */
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

/**
 * Подключение конфигурации web-приложения.
 */
$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
