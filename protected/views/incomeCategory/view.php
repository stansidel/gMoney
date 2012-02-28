<?php
$this->breadcrumbs=array(
	'Income Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List IncomeCategory', 'url'=>array('index')),
	array('label'=>'Create IncomeCategory', 'url'=>array('create')),
	array('label'=>'Update IncomeCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IncomeCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IncomeCategory', 'url'=>array('admin')),
);
?>

<h1>View IncomeCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
