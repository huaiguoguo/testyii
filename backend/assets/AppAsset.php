<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        "inspinia/css/bootstrap.min.css",
        "inspinia/font-awesome/css/font-awesome.css",
//        "inspinia/css/plugins/codemirror/codemirror.css",
//        "inspinia/css/plugins/codemirror/ambiance.css",
        "inspinia/css/plugins/toastr/toastr.min.css",
        "inspinia/js/plugins/gritter/jquery.gritter.css",
        "inspinia/css/animate.css",
        "inspinia/css/style.css",
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $js = [
        "inspinia/js/jquery-3.1.1.min.js",
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
