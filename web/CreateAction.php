<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\web;

use Yii;
//use yii\base\InvalidConfigException;
//use yii\base\InvalidValueException;
use tksoftcn\yii2\web\BaseAction;
use yii\helpers\Url;

/**
 * CRUD新增操作的action类
 *
 * @author TongKe Chen <chentongke@tksoft.cn>
 *        
 */
class CreateAction extends BaseAction
{

    /**
     * 视图母板文件路径
     *
     * @var String
     */
    public $layoutFile = '@tksoftcn/yii2/web/CreateLayout';

    /**
     * 视图文件路径，为空值时，默认设为action的名称
     *
     * @var String
     */
    public $viewFile = 'create';

    /**
     * action的场景
     *
     * @var String
     */
    public $scenarioName = 'create';

    public function run()
    {
        $this->controller->layout = empty($this->controller->createLayoutFile) ? $this->layoutFile : $this->controller->createLayoutFile;
        $model = new $this->modelClass();
        $model->setScenario($this->scenarioName);
        
        if (! empty(Yii::$app->request->post($model->formName()))) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->save();
                $this->controller->{$this->returnSuccessMethod}($this->returnSuccessMsg, Url::toRoute($this->redirectRoute), $this->extraReturnParam);
            } else {
                $this->controller->{$this->returnFailMethod}($this->returnFailMsg, $model->getErrors(), $this->extraReturnParam);
            }
        } else {
            $model->isNewRecord = true;
            return $this->controller->render($this->viewFile, [
                'model' => $model
            ]);
        }
    }
}