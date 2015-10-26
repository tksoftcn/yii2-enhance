<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\web;

use Yii;
use tksoftcn\yii2\web\Controller;
use tksoftcn\yii2\web\CreateAction;
use tksoftcn\yii2\web\UpdateAction;
use tksoftcn\yii2\web\IndexAction;
use tksoftcn\yii2\web\DeleteAction;
use tksoftcn\yii2\web\ViewAction;
/**
 * Crud模板控制器，用于快速建立增删查改的操作页面
 * @author TongKe Chen <chentongke@tksoft.cn>
 *
 */
class CrudController extends Controller
{
    /**
     * 显示操作成功提示信息并跳转页面的方法名，一般对应controller基类里面的信息跳转方法
     * 使用$this->{$returnSuccessMethod}来调用
     *
     * @var String
     */
    public $returnSuccessMethod = 'returnSuccess';
    /**
     * 显示操作失败提示信息并跳转页面的方法名，一般对应controller基类里面的信息跳转方法
     * 使用$this->{$returnFailMethod}来调用
     *
     * @var String
     */
    public $returnFailMethod = 'returnFail';
    /**
     * 数据模型类名，带全namespace
     *
     * @var String
     */
    public $modelClass;
    /**
     * 跳转的路由
     *
     * @var String
     */
    public $redirectRoute;
    
    /**
     * 默认的create动作layout文件
     * @var String
     */
    public $createLayoutFile = '@tksoftcn/yii2/layouts/create';
    /**
     * 默认的update动作layout文件
     * @var String
     */    
    public $updateLayoutFile = '@tksoftcn/yii2/layouts/create';
    /**
     * 默认的view动作layout文件
     * @var String
     */
    public $viewLayoutFile = '@tksoftcn/yii2/layouts/view';
    /**
     * 默认的index动作layout文件
     * @var String
     */
    public $indexLayoutFile = '@tksoftcn/yii2/layouts/index';
    
    /**
     * 默认的create动作view文件
     * @var String
     */
    public $createViewFile = 'create';
    /**
     * 默认的update动作view文件
     * @var String
     */
    public $updateViewFile = 'create';
    /**
     * 默认的view动作view文件
     * @var String
     */
    public $viewViewFile = 'view';
    /**
     * 默认的index动作view文件
     * @var String
     */
    public $indexViewFile = 'index';    
    /**
     * 默认的create动作场景名称，用于model的校验
     * @var String
     */
    public $createScenario = 'create';
    /**
     * 默认的update动作场景名称，用于model的校验
     * @var String
     */
    public $updateScenario = 'update';
    /**
     * 默认的index动作场景名称，用于search框的校验
     * @var String
     */
    public $indexScenario = 'index';
    /**
     * 默认的delete动作场景名称，用于model的校验
     * @var String
     */
    public $deleteScenario = 'delete';
    
    public function init() {
        if (empty($this->redirectRoute))
            $this->redirectRoute = '/' . $this->module->id . '/' . $this->id . '/index';
    }
    
    public function actions()
    {
        return [
            'create' => [
                'class' => CreateAction::className(),
                'layoutFile' => $this->createLayoutFile,
                'viewFile' => $this->createViewFile,
                'scenarioName' => $this->createScenario,
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'layoutFile' => $this->updateLayoutFile,
                'viewFile' => $this->updateViewFile,
                'scenarioName' => $this->updateScenario,                
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'scenarioName' => $this->deleteScenario,
            ],
            'index' => [
                'class' => IndexAction::className(),
                'layoutFile' => $this->indexLayoutFile,
                'viewFile' => $this->indexViewFile,
                'scenarioName' => $this->indexScenario,
            ],     
            'view' => [
                'class' => ViewAction::className(),
                'layoutFile' => $this->viewLayoutFile,
                'viewFile' => $this->viewViewFile,
            ],            
        ];
    }
}