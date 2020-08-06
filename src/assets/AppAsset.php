<?php

namespace application\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle приложения.
 *
 * Используется для подключения стилей и скриптов,
 * выполняемых на клиенте.
 */
class AppAsset extends AssetBundle
{
    /**
     * Путь к asset'ам.
     */
    public $basePath = '@webroot';

    /**
     * Url к asset'ам.
     */
    public $baseUrl = '@web';

    /**
     * CSS стили.
     */
    public $css = [
        'css/site.css'
    ];

    /**
     * Скрипты Javascript.
     */
    public $js = [
    ];

    /**
     * Зависимости.
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
