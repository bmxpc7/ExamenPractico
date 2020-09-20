<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>
<a href="<?=Url::toRoute("site/createmantenimiento")?>" class="btn btn-primary">Agregar Mantenimiento</a>
<h3>Lista de Mantenimientos</h3>

<?= 
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'nombre',
        'atiende',
        'fechaRegistro',
        'fechaMantenimiento',
        'automovil',
    ],
]) ?>