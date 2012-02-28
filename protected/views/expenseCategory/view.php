<?php
$this->breadcrumbs=array(
	'Expense Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ExpenseCategory', 'url'=>array('index')),
	array('label'=>'Create ExpenseCategory', 'url'=>array('create')),
	array('label'=>'Update ExpenseCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExpenseCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExpenseCategory', 'url'=>array('admin')),
);
?>

<h1>View ExpenseCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
