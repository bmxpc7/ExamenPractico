<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<a href="<?=Url::toRoute("site/createcliente")?>" class="btn btn-primary">Agregar Cliente</a>
<h3>Lista de Mantenimientos</h3>
<table class="table table-bordered">
<tr>
<td>ID</td>
<td>Nombre</td>
<td>Apellido</td>
<td>Correo</td>
</tr>
<?php
foreach($model as $row):
?>
<td><?=$row->nombre?></td>
<td><?=$row->atiende?></td>
<td><?=$row->fechaRegistro?></td>
<td><?=$row->fechaMantenimiento?></td>
<td><?=$row->automovil?></td>
<?php
endforeach
?>
</table>