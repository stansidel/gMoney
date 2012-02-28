<?php
$this->breadcrumbs=array(
	'Expense Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExpenseCategory', 'url'=>array('index')),
	array('label'=>'Manage ExpenseCategory', 'url'=>array('admin')),
);
?>

<h1>Create ExpenseCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>