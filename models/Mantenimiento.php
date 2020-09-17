<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\yii\db\Query;


class Mantenimiento extends ActiveRecord
{
    public static function getMantenimiento()
    {
        return Yii::$app->db;
    }
    public static function tableName()
    {
        return 'mantenimiento';
    }
}