<?php

namespace bariew\scheduleModule;

class Module extends \yii\base\Module
{
    /**
     * @var array for menu auto generation
     */
    public $params = [
        'menu'  => [
            'label'    => 'schedules',
            'url' => ['/schedule/item/index']
        ]
    ];
}
