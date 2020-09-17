<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Clientes extends ActiveRecord
{
    public static function getClientes()
    {
        return Yii::$app->db;
    }
    public static function tableName()
    {
        return 'clientes';
    }
}