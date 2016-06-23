<?php
/**
 * Created by PhpStorm.
 * User: pt
 * Date: 23.06.16
 * Time: 3:57
 */

namespace bariew\scheduleModule\widgets;


use bariew\yii2Tools\widgets\ActiveForm;
use bariew\yii2Tools\widgets\ArrayModelField;

class AttachedSchedule extends ArrayModelField
{
    public $model_class, $model_id, $model_method, $model_value, $start_at_local;
    public $interval = 0;
    public $end_at_local = 0;
    public $viewName = 'attachedSchedule';

    public function init()
    {
        parent::init();
        $this->form = $this->form ? : new ActiveForm(['init' => false]);
        $this->model_class = $this->model_class ? : get_class($this->model);
        //$this->model_id = $this->model_id ? : ($this->model->primaryKey ? : 0);
        if (!$this->model_method) {
            $reflection = new \ReflectionClass($this->model_class);
            $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
            array_walk($methods, function(&$v){ $v = $v->name;});
            $this->model_method = array_combine($methods, $methods);
        }
    }
}