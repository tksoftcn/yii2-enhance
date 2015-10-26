<?php
/**
 * @link http://framework.tksoft.cn
 * @copyright Copyright (c) 2015 TongKe Software CO.,Ltd.
 * @license http://framework.tksoft.cn/license
 */
namespace tksoftcn\yii2\base;

use Yii;

/**
 * 全局状态信息的基类，为了统一各个组件所使用的status
 * @author TongKe Chen <chentongke@tksoft.cn>
 *
 */
class Status {
    /**
     * 正常、启用
     */
    const MODEL_ACTIVE = 1;
    /**
     * 禁用
     */
    const MODEL_DISABLE = 2;
    /**
     * 审核中
     */
    const MODEL_AUDIT = 3;
    /**
     * 待激活
     */
    const MODEL_ACTIVATION = 4;
    /**
     * 已删除
     */
    const MODEL_DELETED = 5;
}