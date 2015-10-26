<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\web;

use Yii;
use yii\base\Action;
//use yii\base\InvalidConfigException;
//use yii\base\InvalidValueException;
use yii\helpers\ArrayHelper;

/**
 * 跳转提示页面action
 * 
 * @author TongKe Chen <chentongke@tksoft.cn>
 *        
 */
class RedirectAction extends Action {
    public $ms = 1250;
    public $dialog = '';
    public $returnJs = '';
    public $viewFile = '@tksoftcn\yii2\views\redirect';
    public function run()
    {
        $this->controller->layout = false;
        $get = Yii::$app->request->get();
        $msg = $get['msg'];
        $url = $get['url'];
        $extra = ArrayHelper::remove($get, 'msg');
        $extra = ArrayHelper::remove($extra, 'url');
        
        return $this->controller->render ( $this->viewFile, array (
            'msg' => $msg,
            'url' => $url,
            'ms' => $this->ms,
            'dialog' => $this->dialog,
            'returnjs' => $this->returnjs,
            $extra,
        ) );
    }
}