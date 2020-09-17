<?php

namespace app\models;

use Yii;
use yii\base\Model;

class formClientes extends Model
{
    public $id;
    public $nombre;
    public $telefono;
    public $direccion;
    public $automovil;

    public function rules()
 {
  return [
   ['nombre', 'required', 'message' => 'Campo requerido'],
   ['nombre', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['nombre', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['telefono', 'required', 'message' => 'Campo requerido'],
   ['telefono', 'match', 'pattern' => "/^[0-9]{10}$/", 'message' => 'Ingrese numero valido'],
   ['direccion', 'required', 'message' => 'Campo requerido'],
   ['direccion', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['direccion', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['automovil', 'required', 'message' => 'Campo requerido'],
   ['automovil', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['automovil', 'match', 'pattern' => '/^.{3,20}$/', 'message' => 'Mínimo 3 máximo 20 caracteres'],
  ];
 }
}