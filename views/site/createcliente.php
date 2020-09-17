<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<h1>Agregar Cliente</h1>
<a href="<?=Url::toRoute("site/viewclientes")?>">Ir a Clientes</a>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "nombre")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "telefono")->input("number") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "direccion")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "automovil")->input("text") ?>   
</div>

<?= Html::submitButton("Guardar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>