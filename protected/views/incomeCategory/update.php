<?php
$this->breadcrumbs=array(
	'Income Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IncomeCategory', 'url'=>array('index')),
	array('label'=>'Create IncomeCategory', 'url'=>array('create')),
	array('label'=>'View IncomeCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IncomeCategory', 'url'=>array('admin')),
);
?>

<h1>Update IncomeCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>