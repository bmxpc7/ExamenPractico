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
    ['idCliente', 'required', 'message' => 'Campo requerido'],
    ['atiende', 'required', 'message' => 'Campo requerido'],
    ['atiende', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
    ['atiende', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
    ['fechaRegistro', 'required', 'message' => 'Campo requerido'],
    ['fechaMantenimiento', 'required', 'message' => 'Campo requerido'],
   ];
 }
}