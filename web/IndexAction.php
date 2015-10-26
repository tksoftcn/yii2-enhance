<?php
namespace tksoftcn\yii2\web;

use Yii;
//use yii\base\InvalidConfigException;
//use yii\base\InvalidValueException;
use tksoftcn\yii2\web\BaseAction;
//use yii\helpers\Url;

/**
 * 默认首页、查找或列表页的action类
 *
 * @author tongke
 *        
 */
class IndexAction extends BaseAction
{

    /**
     * 视图母板文件路径
     *
     * @var String
     */
    public $layoutFile = '@tksoftcn/yii2/web/IndexLayout';

    /**
     * 视图文件路径，为空值时，默认设为action的名称
     *
     * @var String
     */
    public $viewFile = 'index';

    /**
     * action的场景
     *
     * @var String
     */
    public $scenarioName = 'index';

    public function run()
    {
        $this->controller->layout = empty($this->controller->indexLayoutFile) ? $this->layoutFile : $this->controller->indexLayoutFile;
        $model = new $this->modelClass();
        //$model->setScenario($this->scenarioName);
        //搜索条件来源于post
        $dataProvider = $model->search(Yii::$app->request->post());
        $model->setAttributes(Yii::$app->request->post());
        
        return $this->controller->render($this->viewFile, [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }
}