<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\web;
use Yii;
/**
 * 全局VIEW基类
 * @author TongKe Chen <chentongke@tksoft.cn>
 *
 */
class View extends \yii\web\View {
    /**
     * 面包屑变量
     * @var Array
     */
    public $breadcrumbs = [];
    /**
     * 导航菜单变量
     * @var Array
     */
    public $menus = [];
    public $navbar = [];
}