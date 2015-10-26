<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\web;

use Yii;
use yii\helpers\Url;
//use yii\web\Response;
//use yii\helpers\StringHelper;

/**
 * 全局控制器基类
 *
 * @author TongKe Chen <chentongke@tksoft.cn>
 *        
 */
class Controller extends \yii\web\Controller
{

    /**
     * 信息跳转页面的路由
     */
    public $redirectRoute;

    public function init()
    {
        parent::init();
    }

    /**
     * 返回成功提示的函数，CRUD基类控制器需要调用
     *
     * @param String $message
     *            提示信息
     * @param String $url
     *            跳转的Url
     * @param Array $extra
     *            额外的跳转参数
     */
    public function returnSuccess($message = '操作成功', $url = '', $extra = [])
    {
        if (! empty($this->redirectRoute)) {
            $url = Url::toRoute([
                $this->redirectRoute,
                'msg' => $message,
                'url' => $url,
                $extra
            ]);
        }
        $this->redirect($url);
    }

    /**
     * 返回错误提示的跳转函数
     *
     * @param String $message
     *            提示信息
     * @param String $detailErrors
     *            详细错误信息的数组
     * @param Array $extra
     *            额外的跳转参数
     */
    public function returnFail($message= '操作失败', $detailErrors = [], $extra = [])
    {
        if (! empty($this->redirectRoute)) {
            $url = Url::toRoute([
                $this->redirectRoute,
                'msg' => $message,
                //url = goback是指回退到上一步
                'url' => 'goback',
                'detailErrors' => $detailErrors,
                $extra
            ]);
        }
        $this->redirect($url);
    }
}