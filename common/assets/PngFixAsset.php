<?php

namespace common\assets;

use yii\web\AssetBundle;
use yii\web\View;

class PngFixAsset extends AssetBundle
{
    public $sourcePath = '@common/assets/src/pngfix';
    public $js = [
        'jquery.ifixpng.js',
        'script.js'
    ];

    public $jsOptions = [
        'condition' => 'lt IE 7',
        'position' => View::POS_HEAD,
    ];
}