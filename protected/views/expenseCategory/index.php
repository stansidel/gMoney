<?php
$this->breadcrumbs=array(
	'Expense Categories',
);

$this->menu=array(
	array('label'=>'Create ExpenseCategory', 'url'=>array('create')),
	array('label'=>'Manage ExpenseCategory', 'url'=>array('admin')),
);
?>

<h1>Expense Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
