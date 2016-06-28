<?php

namespace bariew\scheduleModule;

class ScheduleModule extends \yii\base\Module
{
    /**
     * @var array for menu auto generation
     */
    public $params = [
        'menu'  => [
            'label'    => 'schedules',
            'url' => ['/schedule/schedule/index']
        ]
    ];
}
