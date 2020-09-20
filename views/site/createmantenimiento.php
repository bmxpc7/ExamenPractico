<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Clientes;
?>

<h1>Agregar Mantenimiento</h1>
<a href="<?=Url::toRoute("site/index")?>">Ir a Home</a>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>

<div class="form-group">
<?= $form->field($model, "idCliente")->dropDownList(ArrayHelper::map(Clientes::find()->all(),'id', 'nombre')) ?>

<div class="form-group">
 <?= $form->field($model, "atiende")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "fechaRegistro")->input("date") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "fechaMantenimiento")->input("date") ?>   
</div>

<?= Html::submitButton("Guardar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>