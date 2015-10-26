<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\web;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
//use yii\base\InvalidValueException;

/**
 * CRUD的action基类，定义公用变量
 * 
 * @author TongKe Chen <chentongke@tksoft.cn>
 *        
 */
class BaseAction extends Action
{
    /**
     * 视图母板文件路径
     *
     * @var String
     */
    public $layoutFile;
    /**
     * 视图文件路径，为空值时，默认设为action的名称
     * 
     * @var String
     */
    public $viewFile;

    /**
     * 跳转的路由
     * 
     * @var String
     */
    public $redirectRoute;

    /**
     * 默认的id字段名，view、update、delete等action需要这个字段
     * 通过get方式传参
     * @var unknown
     */
    public $idAttribute = 'id';
    /**
     * 显示操作成功提示信息并跳转页面的方法名，一般对应controller基类里面的信息跳转方法
     * 使用$this->controller->{$returnSuccessMethod}来调用
     * {$returnSuccessMethod}需要接收3个参数,returnSuccessMethod($returnSuccessMsg,$redirectUrl,$extraReturnParam)
     * 后2个参数可以为空
     * 
     * @var String
     */
    public $returnSuccessMethod = 'returnSuccess';
    /**
     * 返回操作成功时的提示语
     * @var String
     */
    public $returnSuccessMsg = '操作成功';
    /**
     * 显示操作失败提示信息并跳转页面的方法名，一般对应controller基类里面的信息跳转方法
     * 使用$this->controller->{$returnFailMethod}来调用
     * {$returnFailMethod}需要接收3个参数,returnFailMethod($returnFailMsg,$detailErrors,$extraReturnParam)
     * 后2个参数可以为空
     *
     * @var String
     */
    public $returnFailMethod = 'returnFail';
    /**
     * 返回操作失败时的提示语
     * @var String
     */
    public $returnFailMsg = '操作失败';
    
    public $returnObjectNotExistMsg = '访问的对象不存在';
    public $returnBadParamMsg = '访问参数错误';
    
    /**
     * 额外的跳转参数，可以用于传递更多的自定义参数到$returnSuccessMethod和$returnFailMethod
     * @var Array
     */
    public $extraReturnParam = [];
    /**
     * 数据模型类名，带全namespace
     * 
     * @var String
     */
    public $modelClass;
    
    /**
     * action的场景
     *
     * @var String
     */
    public $scenarioName;

    /**
     * 重写Constructor，增加参数的初始化处理
     *
     * @param string $id
     *            the ID of this action
     * @param Controller $controller
     *            the controller that owns this action
     * @param array $config
     *            name-value pairs that will be used to initialize the object properties
     */
    public function __construct($id, $controller, $config = [])
    {

        //初始化modelClass
        if (empty($this->modelClass)) {
            if (isset($controller->modelClass) && ! empty($controller->modelClass)) {
                $this->modelClass = $controller->modelClass;
            } else {
                throw new InvalidConfigException("modelClass of action {$id} can not be empty!");
            }
        }
        if (! class_exists($this->modelClass)) {
            throw new InvalidConfigException("modelClass {$this->modelClass} dosen't exist!");
        }

        //初始化跳转地址
        if (empty($this->redirectRoute)) {
            if (isset($controller->redirectRoute) && ! empty($controller->redirectRoute)) {
                $this->redirectRoute = $controller->redirectRoute;
            } else {
                $this->redirectRoute = '/' . $controller->module->id . '/' . $controller->id . '/index';
            }
        }
        parent::__construct($id, $controller, $config);
    }
}