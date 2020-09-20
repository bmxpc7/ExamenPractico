<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


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

    public function getClientes()
{
    return $this->hasOne(Clientes::className(), ['id' => 'idCliente']);
}
}