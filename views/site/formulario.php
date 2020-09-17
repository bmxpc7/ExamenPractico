<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<h1>Formulario</h1>
<h3><?= $mensaje?></h3>
<?= html::beginForm(
    Url::toRoute('site/request'),
    "get",
    ['class'=> 'form-inline']
);
?>
<div class="form-group">
<?= Html::label("Introduce tu nombre", "nombre")?>
<?= Html::textInput("nombre", null,["class"=> "form-control"])?>
</div>
<?=Html::submitInput("Enviar Nombre", ["class"=> "btn btn-primary"])?>
<?= Html::endForm()?>