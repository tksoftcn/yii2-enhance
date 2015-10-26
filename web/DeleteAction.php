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
use tksoftcn\yii2\base\Status;
use yii\helpers\Url;

/**
 * 删除操作的action类
 *
 * @author tongke
 *        
 */
class DeleteAction extends BaseAction
{

    /**
     * action的场景
     *
     * @var String
     */
    public $scenarioName = 'delete';

    /**
     * 是否软删除
     * 
     * @var Boolean
     */
    public $isSoftDelete = FALSE;

    /**
     * 软删除的状态字段
     * 
     * @param
     *            String
     */
    public $softDeleteAttribute = 'status';

    /**
     * 软删除的状态值，如果为空，则默认为Status::MODEL_DELETED
     * 
     * @param
     *            mixed
     */
    public $softDeleteValue;

    public function run()
    {
        $id = Yii::$app->request->get($this->idAttribute, 0);
        if ($id == 0) {
            $this->controller->{$this->returnFailMethod}($this->returnBadParamMsg, [], $this->extraReturnParam);
        }
        $model = new $this->modelClass();
        
        $model->setScenario($this->scenarioName);
        $model = $model::findOne($id);
        if (! empty($model)) {
            // 处理软删除
            if ($this->isSoftDelete) {
                $this->softDeleteValue = ! empty($this->softDeleteValue) ? $this->softDeleteValue : Status::MODEL_DELETED;
                $model->{$this->softDeleteAttribute} = $this->softDeleteValue;
                $model->save();
                $this->controller->{$this->returnSuccessMethod}($this->returnSuccessMsg, Url::toRoute($this->redirectRoute), $this->extraReturnParam);
            } else {
                // 直接删除的情况
                $res = $model->delete();
                if ($res) {
                    $this->controller->{$this->returnSuccessMethod}($this->returnSuccessMsg, Url::toRoute($this->redirectRoute), $this->extraReturnParam);
                } else {
                    $this->controller->{$this->returnFailMethod}($this->returnFailMsg, $model->getErrors(), $this->extraReturnParam);
                }
            }
        } else {
            $this->controller->{$this->returnFailMethod}($this->returnObjectNotExistMsg);
        }
    }
}