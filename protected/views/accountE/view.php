<?php
$this->breadcrumbs=array(
	'Account Es'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AccountE', 'url'=>array('index')),
	array('label'=>'Create AccountE', 'url'=>array('create')),
	array('label'=>'Update AccountE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountE', 'url'=>array('admin')),
);
?>

<h1>View AccountE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'start_amount',
		'date_open',
	),
)); ?>
