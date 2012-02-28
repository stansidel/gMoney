<?php
$this->breadcrumbs=array(
	'Income Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IncomeCategory', 'url'=>array('index')),
	array('label'=>'Manage IncomeCategory', 'url'=>array('admin')),
);
?>

<h1>Create IncomeCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>