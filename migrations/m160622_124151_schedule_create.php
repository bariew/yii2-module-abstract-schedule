<?php

use yii\db\Schema;
use yii\db\Migration;
use bariew\scheduleAbstractModule\models\Schedule;

class m160622_124151_schedule_create extends Migration
{
    public function up()
    {
        $this->createTable(Schedule::tableName(), [
            'id' => Schema::TYPE_PK,
            'owner_id' => Schema::TYPE_INTEGER,
            'interval' => Schema::TYPE_INTEGER,
            'start_at'  => Schema::TYPE_INTEGER,
            'end_at'  => Schema::TYPE_INTEGER,
            'model_class' => Schema::TYPE_STRING,
            'model_id' => Schema::TYPE_INTEGER,
            'model_method' => Schema::TYPE_STRING,
            'model_value' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable(Schedule::tableName());
    }
}
