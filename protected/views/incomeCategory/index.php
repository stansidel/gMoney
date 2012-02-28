<?php
$this->breadcrumbs=array(
	'Income Categories',
);

$this->menu=array(
	array('label'=>'Create IncomeCategory', 'url'=>array('create')),
	array('label'=>'Manage IncomeCategory', 'url'=>array('admin')),
);
?>

<h1>Income Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
