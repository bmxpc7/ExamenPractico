<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Validar extends Model
{
    public $nombre;
    public $email;

    public function rules(){
        return [
            ['nombre', 'required', 'message'=> 'Campo Requerido'],
            ['nombre', 'match', 'pattern' => "/^.{3,50}+$/", 'message'=> "Requiere minimo 3, maximo 50 caracteres"],
            ['nombre', 'match', 'pattern' => "/^.[0-9a-z]+$/i", 'message'=> "Solo se aceptan letras y numeros"], 
            ['email', 'required', 'message'=> 'Campo Requerido'],
            ['email', 'match', 'pattern' => "/^.{3,80}+$/", 'message'=> "Requiere minimo 3, maximo 80 caracteres"],
            ['email', 'email', 'message'=> 'Formato no valido'],
        ];
    }
    public function attributeLabels()
    {
       return [
           'nombre'=> "Nombre: ",
           'email' => "E-Mail: "
       ];
    }
}
