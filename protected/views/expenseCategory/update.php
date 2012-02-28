<?php
$this->breadcrumbs=array(
	'Expense Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExpenseCategory', 'url'=>array('index')),
	array('label'=>'Create ExpenseCategory', 'url'=>array('create')),
	array('label'=>'View ExpenseCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExpenseCategory', 'url'=>array('admin')),
);
?>

<h1>Update ExpenseCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>