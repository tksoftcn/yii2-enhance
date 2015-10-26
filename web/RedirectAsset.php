<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\web;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * 跳转提示页面action的资源包
 *
 * @author tongke
 *        
 */
class RedirectAsset extends AssetBundle
{

    public $sourcePath = '@tksoftcn/yii2/assets';

    public $js = [
        'js\jquery-1.7.2.min.js'
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
}