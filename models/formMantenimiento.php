<?php

namespace app\models;

use Yii;
use yii\base\Model;

class formMantenimiento extends Model
{
    public $id;
    public $idCliente;
    public $atiende;
    public $fechaRegistro;
    public $fechaMantenimiento;

    public function rules()
 {
  return [
   ['atiende', 'required', 'message' => 'Campo requerido'],
   ['atiende', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['atiende', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   //['fechaRegistro', 'match', 'pattern' => "/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/", 'message' => 'Ingresa Fecha Valida'],
   //['fechaMantenimiento', 'match', 'pattern' => "/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/", 'message' => 'Ingresa Fecha Valida'],
  ];
 }
}